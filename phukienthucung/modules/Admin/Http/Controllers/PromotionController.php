<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\ProductReview;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class ProductReviewController extends Controller
{
    public function index()
    {
        $reviews = ProductReview::with(['product', 'user'])->latest()->get();
        return view('admin::reviews.index', compact('reviews'));
    }
}

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::latest()->paginate(100);
        return view('admin::promotions.index', compact('promotions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|unique:promotions,code',
            'description' => 'nullable|string',
            'discount_type' => 'required|in:percent,amount',
            'discount_value' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'usage_limit' => 'required|integer|min:1',
            'is_active' => 'boolean'
        ]);

        Promotion::create($data);
        return redirect()->route('admin.promotions.index')->with('success', 'Tạo mã khuyến mãi thành công.');
    }
    // PromotionController.php
    public function checkCode(Request $request)
    {
        $code = $request->query('code');

        if (!$code) {
            return Response::json(['error' => 'Thiếu mã khuyến mãi'], 400);
        }

        $exists = \App\Models\Promotion::where('code', $code)->exists();

        return Response::json(['exists' => $exists]);
    }
    

    public function update(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);

        $data = $request->validate([
            'code' => 'required|string|unique:promotions,code,' . $promotion->id,
            'description' => 'nullable|string',
            'discount_type' => 'required|in:percent,amount',
            'discount_value' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'usage_limit' => 'nullable|integer|min:1',
            'is_active' => 'boolean'
        ]);

        $promotion->update($data);
        return redirect()->route('admin.promotions.index')->with('success', 'Cập nhật khuyến mãi thành công.');
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('success', 'Đã xóa khuyến mãi.');
    }
}
