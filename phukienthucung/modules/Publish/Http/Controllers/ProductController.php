<?php

namespace Modules\Publish\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::with(['images', 'brand', 'categories'])
            ->where('slug', $slug)
            ->where('is_active', 1)
            ->firstOrFail();

        $reviews = ProductReview::where('product_id', $product->id)
            ->where('status', 'approved')
            ->orderByDesc('created_at')
            ->get();

        return view('publish::products.show', compact('product', 'reviews'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $categoryIds = collect([$category->id])->merge(
            $category->children->pluck('id')
        );

        $products = Product::with('images')
            ->where('is_active', 1)
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('id', $categoryIds);
            })
            ->latest()
            ->get();

        return view('publish::products.category', compact('category', 'products'));
    }
}
