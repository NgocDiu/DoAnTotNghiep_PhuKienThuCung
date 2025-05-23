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

use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $total = $cart->items->sum(function ($item) {
            $price = $item->product->is_discount ? $item->product->discount_price : $item->product->price;
            return $price * $item->quantity;
        });

        $addresses = Auth::user()->addresses;

        return view('publish::checkout.index', compact('cart', 'total', 'addresses'));
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
        ]);

        $user = Auth::user();
        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng rỗng!');
        }

        $total = $cart->items->sum(function ($item) {
            $price = $item->product->is_discount ? $item->product->discount_price : $item->product->price;
            return $price * $item->quantity;
        });

       $shipFee = (int) $request->input('ship_fee', 0);
        $grandTotal = $total + $shipFee;


        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => $user->id,
                'address_id' => $request->address_id,
                'status' => 'pending',
                'take_it' => 0,
                'total_amount' => $total,
                'ship_fee' => $shipFee,
                'note' => $request->note,
            ]);

            foreach ($cart->items as $item) {
                $unitPrice = $item->product->is_discount ? $item->product->discount_price : $item->product->price;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $unitPrice,
                    'line_total' => $item->quantity * $unitPrice,
                ]);
                $item->product->decrement('stock_quantity', $item->quantity);

            }

            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $request->payment_method,
                'amount' => $grandTotal,
                'status' => $request->payment_method === 'vnpay' ? 'waiting' : 'pending',
            ]);
            

            $cart->items()->delete();
            $cart->delete();

            DB::commit();

            return $request->payment_method === 'cod'
                ? redirect()->route('checkout.success', $order->id)
                : $this->payWithVnpay($order);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Lỗi: ' . $e->getMessage()]);
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
