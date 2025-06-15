<?php
namespace Modules\Publish\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Promotion;

use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        Log::info('--- Dữ liệu nhận được từ request ---');
        Log::info('Tất cả input:', $request->all());
        Log::info('selected_items:', ['value' => $request->input('selected_items')]);

        $user = Auth::user();
        Log::info('Người dùng đăng nhập:', ['id' => $user->id, 'email' => $user->email]);

        $selectedIds = (array) $request->input('selected_items');

        if (!is_array($selectedIds) || count($selectedIds) === 0) {
            return redirect()->route('cart.index')->with('error', 'Vui lòng chọn ít nhất một sản phẩm để thanh toán.');
        }

        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $selectedItems = $cart->items->filter(function ($item) use ($selectedIds) {
            return in_array($item->id, $selectedIds);
        });

        if ($selectedItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Không tìm thấy sản phẩm đã chọn.');
        }

        $total = $selectedItems->sum(function ($item) {
            $price = $item->product->is_discount ? $item->product->discount_price : $item->product->price;
            return $price * $item->quantity;
        });

        $addresses = $user->addresses;
        $promotions = Promotion::where('is_active', true)
        ->where(function ($q) {
            $q->whereNull('end_date')->orWhere('end_date', '>=', now());
        })->get();





        return view('publish::checkout.index', [
            'cart' => $cart,
            'selectedItems' => $selectedItems,
            'total' => $total,
            'addresses' => $addresses,
            'promotions'=>$promotions
        ]);
    }

    
    


    

    public function success($id)
    {
        $order = Order::with('items.product', 'payment')->findOrFail($id);

        return view('publish::checkout.success', [
            'order' => $order,
            'items' => $order->items
        ]);
    }

    public function process(Request $request)
{
    $request->validate([
        'address_id' => 'required|exists:address,id',
        'payment_method' => 'required|string',
        'selected_items' => 'required|array',
    ],
    [
        'address_id.required' => 'Bạn chưa chọn địa chỉ.',
        'address_id.exists' => 'Địa chỉ không hợp lệ.',
    ]);

    $user = Auth::user();
    $selectedIds = $request->input('selected_items');

    $cart = Cart::with(['items.product'])->where('user_id', $user->id)->first();

    if (!$cart || $cart->items->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Giỏ hàng rỗng!');
    }

    // Lọc ra các item được chọn
    $selectedItems = $cart->items->filter(function ($item) use ($selectedIds) {
        return in_array($item->id, $selectedIds);
    });

    if ($selectedItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Không tìm thấy sản phẩm đã chọn.');
    }
    foreach ($selectedItems as $item) {
        $product = $item->product;
        $available = $product->stock_quantity;
    
        if ($item->quantity > $available) {
            return back()->withErrors([
                'error' => "Sản phẩm {$product->name} chỉ còn {$available} sản phẩm trong kho."
            ]);
        }
    }
    
    // Tính tổng
    $total = $selectedItems->sum(function ($item) {
        $price = $item->product->is_discount ? $item->product->discount_price : $item->product->price;
        return $price * $item->quantity;
    });

    // Xử lý mã giảm giá (nếu có)
    $couponCode = $request->input('promotion_code');
    $discountAmount = 0;
    $promotion = null;
    if ($couponCode) {
        $promotion = \App\Models\Promotion::where('code', $couponCode)
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            })
            ->first();

        if ($promotion) {
            $discountAmount = $promotion->discount_type == 'percent'
                ? round($total * $promotion->discount_value / 100)
                : min($promotion->discount_value, $total);
        }
    }



    $shipFee = (int) $request->input('ship_fee', 0);
    $grandTotal = max(0, $total - $discountAmount + $shipFee);

    DB::beginTransaction();
    try {
        $order = Order::create([
            'user_id' => $user->id,
            'promotion_id' => $promotion?->id,
            'address_id' => $request->address_id,
            'status' => 'pending',
            'take_it' => 0,
            'total_amount' => $total,
            'discount_amount' => $discountAmount,
            'grand_total' => $grandTotal, 
            'ship_fee' => $shipFee,
            'note' => $request->note,
        ]);
        

        foreach ($selectedItems as $item) {
            $unitPrice = $item->product->is_discount ? $item->product->discount_price : $item->product->price;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $unitPrice,
                'line_total' => $unitPrice * $item->quantity,
            ]);

            // Cập nhật tồn kho
            $item->product->decrement('stock_quantity', $item->quantity);
        }

        Payment::create([
            'order_id' => $order->id,
            'payment_method' => $request->payment_method,
            'amount' => $grandTotal,
            'status' => $request->payment_method === 'vnpay' ? 'waiting' : 'pending',
        ]);

        // Xóa các item đã chọn khỏi cart
        $cart->items()->whereIn('id', $selectedIds)->delete();

        // Nếu không còn item nào thì xóa cart luôn
        if ($cart->items()->count() === 0) {
            $cart->delete();
        }

        DB::commit();

        return $request->payment_method === 'cod'
            ? redirect()->route('checkout.success', $order->id)
            : $this->payWithVnpay($order);

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'Lỗi khi xử lý đơn hàng: ' . $e->getMessage()]);
    }
}


    public function payWithVnpay(Order $order)
    {


        if ($order->user_id != Auth::guard('publish')->id()) {
            abort(403);
        }
        

        $payment = Payment::where('order_id', $order->id)
            ->where('payment_method', 'vnpay')
            ->first();

        if (!$payment) {
            return redirect()->route('publish.index')->with('error', 'Không tìm thấy thanh toán VNPAY cho đơn hàng này.');
        }

        if ($payment->status === 'success') {
            return redirect()->route('checkout.success', $order->id);
        }

        return $this->redirectToVnpay($order);
    }

    public function redirectToVnpay(Order $order)
    {
        $grandTotal = $order->total_amount + $order->ship_fee;

        $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
        $vnp_TmnCode = config('vnpay.tmn_code');
        $vnp_HashSecret = config('vnpay.hash_secret');
        $vnp_Returnurl = route('checkout.vnpay.return');
        $vnp_TxnRef = $order->id . '-' . now()->format('YmdHis');
        $vnp_OrderInfo = 'Thanh toan don hang #' . $order->id;
        $vnp_Amount = (int) round($grandTotal * 100);
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        Log::info('VNPAY - Tổng tiền (grandTotal): ' . $grandTotal);
        Log::info('VNPAY - Số tiền gửi đi (vnp_Amount): ' . $vnp_Amount);

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => now()->format('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => "billpayment",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        ksort($inputData);
        $hashdata = '';
        $query = '';
        $i = 0;
        foreach ($inputData as $key => $value) {
            $hashdata .= ($i++ ? '&' : '') . urlencode($key) . "=" . urlencode($value);
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= "?" . $query . 'vnp_SecureHash=' . $vnpSecureHash;

        return response()->redirectTo($vnp_Url);
    }

    public function vnpayReturn(Request $request)
    {
        $vnp_SecureHash = $request->vnp_SecureHash;
        $inputData = $request->except('vnp_SecureHash', 'vnp_SecureHashType');

        ksort($inputData);
        $hashData = '';
        $i = 0;
        foreach ($inputData as $key => $value) {
            $hashData .= ($i++ ? '&' : '') . urlencode($key) . "=" . urlencode($value);
        }

        $secureHash = hash_hmac('sha512', $hashData, config('vnpay.hash_secret'));

        if ($secureHash === $vnp_SecureHash) {
            $orderId = explode('-', $request->vnp_TxnRef)[0];
            $order = Order::with('items.product', 'payment')->find($orderId);

            if ($order && $request->vnp_ResponseCode == '00') {
                $payment = Payment::where('order_id', $order->id)
                    ->where('payment_method', 'vnpay')
                    ->first();

                if ($payment) {
                    $payment->update([
                        'status' => 'success',
                        'payment_time' => now(),
                    ]);
                }

                return redirect()->route('checkout.success', $order->id);
            }
        }

        return redirect()->route('publish.index')->with('error', 'Thanh toán VNPAY không thành công.');
    }
    public function retryVnpay(Order $order)
    {
        return $this->payWithVnpay($order); // Laravel sẽ resolve Order tự động
    }
    
}








// <?php
// namespace Modules\Publish\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use App\Models\Cart;
// use App\Models\Order;
// use App\Models\OrderItem;
// use App\Models\Payment;
// use App\Models\Promotion;
// use Illuminate\Support\Facades\Log;

// class CheckoutController extends Controller
// {
//     public function index()
//     {
//         $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();
//         if (!$cart || $cart->items->isEmpty()) {
//             return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
//         }

//         $total = $cart->items->sum(function ($item) {
//             $price = $item->product->is_discount ? $item->product->discount_price : $item->product->price;
//             return $price * $item->quantity;
//         });

//         $addresses = Auth::user()->addresses;

//         return view('publish::checkout.index', compact('cart', 'total', 'addresses'));
//     }

//     public function success($id)
//     {
//         $order = Order::with('items.product', 'payment')->findOrFail($id);

//         return view('publish::checkout.success', [
//             'order' => $order,
//             'items' => $order->items
//         ]);
//     }

//     public function process(Request $request)
//     {
//         $request->validate([
//             'address_id' => 'required|exists:address,id',
//             'payment_method' => 'required|string',
//         ]);

//         $user = Auth::user();
//         $cart = Cart::with('items.product')->where('user_id', $user->id)->first();

//         if (!$cart || $cart->items->isEmpty()) {
//             return redirect()->route('cart.index')->with('error', 'Giỏ hàng rỗng!');
//         }

//         $total = $cart->items->sum(function ($item) {
//             $price = $item->product->is_discount ? $item->product->discount_price : $item->product->price;
//             return $price * $item->quantity;
//         });

//         $promotionDiscount = 0;
//         $promotionCode = $request->input('promotion_code');

//         if ($promotionCode) {
//             $promotion = Promotion::where('code', $promotionCode)
//                 ->where('is_active', true)
//                 ->whereDate('start_date', '<=', now())
//                 ->whereDate('end_date', '>=', now())
//                 ->first();

//             if ($promotion) {
//                 if ($promotion->discount_type === 'percent') {
//                     $promotionDiscount = ($total * $promotion->discount_value) / 100;
//                 } elseif ($promotion->discount_type === 'amount') {
//                     $promotionDiscount = $promotion->discount_value;
//                 }
//             }
//         }

//         $shipFee = (int) $request->input('ship_fee', 0);
//         $grandTotal = max(0, $total - $promotionDiscount + $shipFee);

//         DB::beginTransaction();
//         try {
//             $order = Order::create([
//                 'user_id' => $user->id,
//                 'address_id' => $request->address_id,
//                 'status' => 'pending',
//                 'take_it' => 0,
//                 'total_amount' => $total,
//                 'ship_fee' => $shipFee,
//                 'note' => $request->note,
//                 'promotion_code' => $promotionCode,
//                 'promotion_discount' => $promotionDiscount,
//             ]);

//             foreach ($cart->items as $item) {
//                 $unitPrice = $item->product->is_discount ? $item->product->discount_price : $item->product->price;

//                 OrderItem::create([
//                     'order_id' => $order->id,
//                     'product_id' => $item->product_id,
//                     'quantity' => $item->quantity,
//                     'price' => $unitPrice,
//                     'line_total' => $item->quantity * $unitPrice,
//                 ]);
//                 $item->product->decrement('stock_quantity', $item->quantity);
//             }

//             Payment::create([
//                 'order_id' => $order->id,
//                 'payment_method' => $request->payment_method,
//                 'amount' => $grandTotal,
//                 'status' => $request->payment_method === 'vnpay' ? 'waiting' : 'pending',
//             ]);

//             $cart->items()->delete();
//             $cart->delete();

//             DB::commit();

//             return $request->payment_method === 'cod'
//                 ? redirect()->route('checkout.success', $order->id)
//                 : $this->payWithVnpay($order);
//         } catch (\Exception $e) {
//             DB::rollBack();
//             return back()->withErrors(['error' => 'Lỗi: ' . $e->getMessage()]);
//         }
//     }

//     public function payWithVnpay(Order $order)
//     {
//         if ($order->user_id != Auth::guard('publish')->id()) {
//             abort(403);
//         }

//         $payment = Payment::where('order_id', $order->id)
//             ->where('payment_method', 'vnpay')
//             ->first();

//         if (!$payment) {
//             return redirect()->route('publish.index')->with('error', 'Không tìm thấy thanh toán VNPAY cho đơn hàng này.');
//         }

//         if ($payment->status === 'success') {
//             return redirect()->route('checkout.success', $order->id);
//         }

//         return $this->redirectToVnpay($order);
//     }

//     public function redirectToVnpay(Order $order)
//     {
//         $grandTotal = $order->total_amount - ($order->promotion_discount ?? 0) + $order->ship_fee;

//         $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
//         $vnp_TmnCode = config('vnpay.tmn_code');
//         $vnp_HashSecret = config('vnpay.hash_secret');
//         $vnp_Returnurl = route('checkout.vnpay.return');
//         $vnp_TxnRef = $order->id . '-' . now()->format('YmdHis');
//         $vnp_OrderInfo = 'Thanh toan don hang #' . $order->id;
//         $vnp_Amount = (int) round($grandTotal * 100);
//         $vnp_Locale = 'vn';
//         $vnp_IpAddr = request()->ip();
//         Log::info('VNPAY - Tổng tiền (grandTotal): ' . $grandTotal);
//         Log::info('VNPAY - Số tiền gửi đi (vnp_Amount): ' . $vnp_Amount);

//         $inputData = [
//             "vnp_Version" => "2.1.0",
//             "vnp_TmnCode" => $vnp_TmnCode,
//             "vnp_Amount" => $vnp_Amount,
//             "vnp_Command" => "pay",
//             "vnp_CreateDate" => now()->format('YmdHis'),
//             "vnp_CurrCode" => "VND",
//             "vnp_IpAddr" => $vnp_IpAddr,
//             "vnp_Locale" => $vnp_Locale,
//             "vnp_OrderInfo" => $vnp_OrderInfo,
//             "vnp_OrderType" => "billpayment",
//             "vnp_ReturnUrl" => $vnp_Returnurl,
//             "vnp_TxnRef" => $vnp_TxnRef,
//         ];

//         ksort($inputData);
//         $hashdata = '';
//         $query = '';
//         $i = 0;
//         foreach ($inputData as $key => $value) {
//             $hashdata .= ($i++ ? '&' : '') . urlencode($key) . "=" . urlencode($value);
//             $query .= urlencode($key) . "=" . urlencode($value) . '&';
//         }

//         $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
//         $vnp_Url .= "?" . $query . 'vnp_SecureHash=' . $vnpSecureHash;

//         return response()->redirectTo($vnp_Url);
//     }

//     public function vnpayReturn(Request $request)
//     {
//         $vnp_SecureHash = $request->vnp_SecureHash;
//         $inputData = $request->except('vnp_SecureHash', 'vnp_SecureHashType');

//         ksort($inputData);
//         $hashData = '';
//         $i = 0;
//         foreach ($inputData as $key => $value) {
//             $hashData .= ($i++ ? '&' : '') . urlencode($key) . "=" . urlencode($value);
//         }

//         $secureHash = hash_hmac('sha512', $hashData, config('vnpay.hash_secret'));

//         if ($secureHash === $vnp_SecureHash) {
//             $orderId = explode('-', $request->vnp_TxnRef)[0];
//             $order = Order::with('items.product', 'payment')->find($orderId);

//             if ($order && $request->vnp_ResponseCode == '00') {
//                 $payment = Payment::where('order_id', $order->id)
//                     ->where('payment_method', 'vnpay')
//                     ->first();

//                 if ($payment) {
//                     $payment->update([
//                         'status' => 'success',
//                         'payment_time' => now(),
//                     ]);
//                 }

//                 return redirect()->route('checkout.success', $order->id);
//             }
//         }

//         return redirect()->route('publish.index')->with('error', 'Thanh toán VNPAY không thành công.');
//     }

//     public function retryVnpay(Order $order)
//     {
//         return $this->payWithVnpay($order);
//     }
// }
