<?php
namespace Modules\Admin\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Routing\Controller;

class ProductReviewController extends Controller
{
    public function index()
    {
        $reviews = ProductReview::with(['product', 'user'])->latest()->get();
        return view('admin::reviews.index', compact('reviews'));
    }

    
}
