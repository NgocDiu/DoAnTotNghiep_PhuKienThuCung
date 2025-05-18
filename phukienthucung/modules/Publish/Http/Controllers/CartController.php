<?php

namespace Modules\Publish\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return view('publish::cart.index', ['cartItems' => [], 'total' => 0]);
        }

        $total = $cart->items->sum(function ($item) {
            $price = $item->product->is_discount ? $item->product->discount_price : $item->product->price;
            return $price * $item->quantity;
        });

        return view('publish::cart.index', [
            'cartItems' => $cart->items,
            'total' => $total
        ]);
    }

    // Thêm sản phẩm vào giỏ
    public function add(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($productId);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cartItem = $cart->items()->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity);
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công!');
    }

    // Xóa sản phẩm khỏi giỏ
    public function remove($itemId)
{
    $cartItem = CartItem::where('id', $itemId)
        ->whereHas('cart', function ($q) {
            $q->where('user_id', Auth::id());
        })->firstOrFail();

    $cartItem->delete();

    if (request()->expectsJson()) {
        return response()->json(['success' => true]);
    }

    return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng');
}


    // Cập nhật số lượng sản phẩm
    public function update(Request $request, $itemId)
{
    $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);

    $cartItem = CartItem::where('id', $itemId)
        ->whereHas('cart', function ($q) {
            $q->where('user_id', Auth::id());
        })->firstOrFail();

    $cartItem->update(['quantity' => $request->quantity]);

    // Nếu gọi bằng fetch (AJAX)
    if ($request->expectsJson()) {
        return response()->json(['success' => true]);
    }

    // Nếu submit bằng form bình thường
    return redirect()->back()->with('success', 'Cập nhật số lượng thành công');
}


}
