<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
class OrderController extends Controller
{
    public function index()
    {
        // Lấy tất cả đơn hàng và quan hệ liên quan
        $orders = Order::with(['user', 'address', 'items.product', 'payment'])
        ->orderBy('created_at', 'asc')
        ->get();

        return view('admin::orders.index', compact('orders'));
    }
    public function createGhnOrder(Order $order)
{
    $setting = ghn_setting();

    if (!$setting || !$order->address) {
        return redirect()->back()->withErrors(['Không đủ thông tin để tạo đơn GHN']);
    }

    $items = $order->items->map(function ($item) {
        $attrs = $item->product->attributeValues->pluck('value', 'attribute_id');
        return [
            'name' => $item->product->name,
            'code' => 'PROD' . $item->product_id,
            'quantity' => (int) $item->quantity,
            'price' =>(int) $item->price,
            'length' => (int) ($attrs[4] ?? 1),
            'width' => (int) ($attrs[5] ?? 1),
            'height' => (int) ($attrs[6] ?? 1),
            'weight' => (int) ($attrs[2] ?? 200),
            'category' => ['level1' => 'Sản phẩm']
        ];
    })->toArray();

    $body = [
        'payment_type_id' => 1,
        'note' => $order->note ?? '',
        'required_note' => 'CHOXEMHANGKHONGTHU',
        'from_name' => $setting->name,
        'from_phone' => $setting->phone,
        'from_address' => $setting->address,
        'from_ward_name' => $setting->ward_name,
        'from_district_name' => $setting->district_name,
        'from_province_name' => $setting->province_name,
        'return_phone' => $setting->phone,
        'return_address' => $setting->address,
        'to_name' => $order->address->to_name,
        'to_phone' => $order->address->to_phone,
        'to_address' => $order->address->to_address,
        'to_ward_code' => $order->address->to_ward_code,
        'to_district_id' => $order->address->to_district_id,
        'cod_amount' => $order->payment_method === 'cod' ? (int) $order->grand_total : 0,
        'content' => 'Đơn hàng #' . $order->id,
        'weight' => array_sum(array_column($items, 'weight')),
        'length' => array_sum(array_column($items, 'length')),
        'width' => array_sum(array_column($items, 'width')),
        'height' => array_sum(array_column($items, 'height')),
        'insurance_value' => (int) $order->grand_total,
        'service_id' => 0,
        'service_type_id' => 2,
        'coupon' => null,
        'pick_shift' => [2],
        'items' => $items
    ];

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Token' => $setting->token,
        'ShopId' => $setting->shop_id,
    ])->post('https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create', $body);

    if ($response->successful()) {
        $order->update([
            'ghn_code' => $response->json('data.order_code'), // Lưu mã đơn hàng GHN nếu cần
            'status' => 'confirmed', // hoặc số nếu status là int
        ]);

        return redirect()->back()->with('success', 'Tạo đơn GHN thành công');
    } else {
        return redirect()->back()->withErrors([
            'Lỗi tạo đơn GHN: ' . $response->json('message')
        ]);
    }
    }
    public function changeStatus(Order $order, Request $request)
    {
        $newStatus = $request->input('status');

        if (!in_array($newStatus, ['confirmed', 'shipping', 'delivered', 'returned'])) {
            return redirect()->back()->withErrors(['Trạng thái không hợp lệ.']);
        }

        // Hoàn trả hàng hoặc hủy đơn: cộng lại vào kho
        if (in_array($newStatus, ['cancelled', 'returned'])) {
            foreach ($order->items as $item) {
                $item->product->increment('stock_quantity', $item->quantity);
            }
        }

        $order->update(['status' => $newStatus]);

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công.');
    }
    public function cancel(Order $order)
    {
        if ($order->status !== 'pending') {
            return redirect()->back()->withErrors(['Chỉ có thể hủy đơn hàng khi đang chờ xác nhận.']);
        }

        foreach ($order->items as $item) {
            $item->product->increment('stock_quantity', $item->quantity);
        }

        $order->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Đơn hàng đã được hủy.');
    }
}
