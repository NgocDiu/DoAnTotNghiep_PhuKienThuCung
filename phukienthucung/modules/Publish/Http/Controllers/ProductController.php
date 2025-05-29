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

    /**
     * Đệ quy lấy tất cả ID danh mục con của 1 category
     */
    protected function getAllCategoryIds(Category $category)
    {
        $ids = collect([$category->id]);

        foreach ($category->children as $child) {
            $ids = $ids->merge($this->getAllCategoryIds($child));
        }

        return $ids;
    }

    public function category($slug)
{
    $category = Category::with('children.children.children')->where('slug', $slug)->firstOrFail();
    $categoryIds = $this->getAllCategoryIds($category);

    // Base query: chỉ lọc theo danh mục (chưa lọc giá/sắp xếp)
    $baseProductQuery = Product::where('is_active', 1)
        ->whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('id', $categoryIds);
        });

    // Lưu lại query clone để tính min/max trước khi lọc
    $priceQueryClone = (clone $baseProductQuery);

    $minPrice = $priceQueryClone->min('price') ?? 0;
    $maxPrice = $priceQueryClone->max('price') ?? 0;

    // Tạo 5 khoảng giá
    $priceRanges = [];
    if ($maxPrice > $minPrice) {
        $rangeCount = 5;
        $step = ceil(($maxPrice - $minPrice) / $rangeCount);
        for ($i = 0; $i < $rangeCount; $i++) {
            $from = $minPrice + $i * $step;
            $to = $from + $step;
            $priceRanges[] = ['min' => $from, 'max' => $to];
        }
    }

    // Lọc theo khoảng giá (nếu có)
    $minFilter = request()->query('min');
    $maxFilter = request()->query('max');

    if ($minFilter !== null && $maxFilter !== null) {
        $baseProductQuery->whereBetween('price', [(int)$minFilter, (int)$maxFilter]);
    }

    // Sắp xếp theo lựa chọn (orderby)
    switch (request('orderby')) {
        case 'price':
            $baseProductQuery->orderBy('price', 'asc');
            break;
        case 'price-desc':
            $baseProductQuery->orderBy('price', 'desc');
            break;
        case 'date':
        default:
            $baseProductQuery->orderBy('created_at', 'desc');
            break;
    }

    // Lấy sản phẩm sau khi lọc và sắp xếp
    $products = $baseProductQuery->get();

    // Tìm cha cấp cao nhất
    $topParent = $category;
    while ($topParent->parent) {
        $topParent = $topParent->parent;
    }

    return view('publish::products.category', compact(
        'category',
        'products',
        'topParent',
        'priceRanges',
        'minFilter',
        'maxFilter'
    ));
}

public function search(Request $request)
{
    $keyword = $request->query('q');

    // Base query tìm theo tên sản phẩm
    $baseProductQuery = Product::where('is_active', 1)
        ->where('name', 'like', '%' . $keyword . '%');

    // Clone để tính min/max giá TRƯỚC khi lọc
    $priceQueryClone = (clone $baseProductQuery);

    $minPrice = $priceQueryClone->min('price') ?? 0;
    $maxPrice = $priceQueryClone->max('price') ?? 0;

    $priceRanges = [];
    if ($maxPrice > $minPrice) {
        $rangeCount = 5;
        $step = ceil(($maxPrice - $minPrice) / $rangeCount);
        for ($i = 0; $i < $rangeCount; $i++) {
            $from = $minPrice + $i * $step;
            $to = $from + $step;
            $priceRanges[] = ['min' => $from, 'max' => $to];
        }
    }

    // Lọc khoảng giá nếu có
    $minFilter = $request->query('min');
    $maxFilter = $request->query('max');

    if ($minFilter !== null && $maxFilter !== null) {
        $baseProductQuery->whereBetween('price', [(int)$minFilter, (int)$maxFilter]);
    }

    // Sắp xếp
    switch ($request->query('orderby')) {
        case 'price':
            $baseProductQuery->orderBy('price', 'asc');
            break;
        case 'price-desc':
            $baseProductQuery->orderBy('price', 'desc');
            break;
        case 'date':
        default:
            $baseProductQuery->orderBy('created_at', 'desc');
            break;
    }

    $products = $baseProductQuery->get();

    return view('publish::products.search', compact(
        'keyword',
        'products',
        'priceRanges',
        'minFilter',
        'maxFilter'
    ));
}



}
