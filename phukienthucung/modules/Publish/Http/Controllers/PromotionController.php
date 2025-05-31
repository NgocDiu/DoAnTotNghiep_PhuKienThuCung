<?php

namespace Modules\Publish\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function check(Request $request)
    {
        $code = $request->query('code');

        if (!$code) {
            return response()->json([
                'valid' => false,
                'message' => 'Vui lòng nhập mã.'
            ]);
        }

        $coupon = Promotion::where('code', $code)
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('end_date')
                      ->orWhere('end_date', '>=', now());
            })
            ->first();

        if (!$coupon) {
            return response()->json([
                'valid' => false,
                'message' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn.'
            ]);
        }

        return response()->json([
            'valid' => true,
            'type' => $coupon->discount_type,      // sửa đúng tên cột
            'value' => $coupon->discount_value,    // sửa đúng tên cột
            'message' => 'Mã hợp lệ.'
        ]);
    }
}
