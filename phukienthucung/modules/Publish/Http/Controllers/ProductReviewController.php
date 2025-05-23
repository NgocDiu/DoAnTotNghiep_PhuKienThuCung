<?php

namespace Modules\Publish\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class ProductReviewController extends Controller
{
    /**
     * Store a newly created product review.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        // Check if the user already reviewed this product
        $exists = ProductReview::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($exists) {
            return back()->withErrors(['Bạn đã đánh giá sản phẩm này rồi.']);
        }

        ProductReview::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'status' => 'approved', // Hoặc 'pending' nếu bạn cần duyệt thủ công
        ]);

        return back()->with('success', 'Đánh giá của bạn đã được ghi nhận.');
    }
}
