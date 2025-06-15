<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\ProductReview;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
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
    $validator = Validator::make($request->all(), [
        'code' => 'required|string|unique:promotions,code',
        'description' => 'nullable|string',
        'discount_type' => ['required', Rule::in(['percent', 'amount'])],
        'discount_value' => 'required|numeric|min:0',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'usage_limit' => 'required|integer|min:1',
        'is_active' => 'boolean',
    ], [
        'end_date.after_or_equal' => 'Ngày hết hạn không được nhỏ hơn ngày bắt đầu.',
        'usage_limit.min' => 'Số lượt sử dụng phải lớn hơn 0.',
        'discount_value.min' => 'Giá trị khuyến mãi phải lớn hơn hoặc bằng 0.',
    ]);

    // ✅ Nếu là %, thì discount_value phải ≤ 100
    $validator->after(function ($validator) use ($request) {
        if ($request->discount_type === 'percent' && $request->discount_value > 100) {
            $validator->errors()->add('discount_value', 'Giá trị khuyến mãi theo % không được vượt quá 100%.');
        }
    });

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $data = $validator->validated();

    // ✅ Gán thời gian kết thúc về 23:59:59
    $data['end_date'] = Carbon::parse($data['end_date'])->setTime(23, 59, 59);

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

    $validator = Validator::make($request->all(), [
        'code' => [
            'required',
            'string',
            Rule::unique('promotions', 'code')->ignore($promotion->id),
        ],
        'description' => 'nullable|string',
        'discount_type' => ['required', Rule::in(['percent', 'amount'])],
        'discount_value' => 'required|numeric|min:0',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'usage_limit' => 'nullable|integer|min:1',
        'is_active' => 'boolean',
    ], [
        'end_date.after_or_equal' => 'Ngày hết hạn không được nhỏ hơn ngày bắt đầu.',
        'usage_limit.min' => 'Số lượt sử dụng phải lớn hơn 0.',
        'discount_value.min' => 'Giá trị khuyến mãi phải lớn hơn hoặc bằng 0.',
        'code.unique' => 'Mã khuyến mãi đã tồn tại.',
    ]);

    // ✅ Nếu là % thì không được vượt quá 100
    $validator->after(function ($validator) use ($request) {
        if ($request->discount_type === 'percent' && $request->discount_value > 100) {
            $validator->errors()->add('discount_value', 'Giá trị khuyến mãi theo % không được vượt quá 100%.');
        }
    });

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $data = $validator->validated();

    // ✅ Ép end_date về cuối ngày
    $data['end_date'] = Carbon::parse($data['end_date'])->setTime(23, 59, 59);

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
