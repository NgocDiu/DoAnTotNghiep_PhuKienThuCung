<?php
use App\Models\Menu;
use App\Models\Category;
use App\Models\Article;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


if (!function_exists('module_asset')) {
    function module_asset($path)
    {
        return asset('modules/' . str_replace('::', '/', $path));
    }
}

if (!function_exists('getParentMenusWithCategory')) {
    function getParentMenusWithCategory()
    {
        return Menu::with(['category', 'page']) // thêm 'page' ở đây
            ->where('is_active', 1)
            ->orderBy('position')
            ->get();
    }
}


if (!function_exists('getParentCategories')) {
    function getParentCategories()
    {
    return Category::whereNull('parent_id')->orderBy('id')->get();
    }
}

if (!function_exists('getChildCategories')) {
    function getChildCategories($parentId)
    {
        return Category::where('parent_id', $parentId)->orderBy('name')->get();
    }
}

if (!function_exists('getActiveArticles')) {
    function getActiveArticles($limit = null)
    {
        $query = Article::where('is_active', 1)->orderByDesc('created_at');

        return $limit ? $query->limit($limit)->get() : $query->get();
    }
}

if (!function_exists('getStaticMenus')) {
    function getStaticMenus()
    {
        return Menu::where('type', 'static')->orderBy('position')->get();
    }
}
if (!function_exists('getPagesMenus')) {
    function getPagesMenus()
    {
        return Menu::where('type', 'page')->orderBy('position')->get();
    }
}
if (!function_exists('getActiveProductsWithImage')) {
    function getActiveProductsWithImage($limit = 8)
    {
        return \App\Models\Product::with(['images' => function ($query) {
            $query->orderBy('is_main', 'desc');
        }])
        ->where('is_active', 1)
        ->where('stock_quantity', '>', 0)
        ->latest()
        ->take($limit)
        ->get();
    }
}
if (!function_exists('getNewProductsWithImage')) {
    function getNewProductsWithImage($limit = 8)
    {
        return \App\Models\Product::with(['images' => function ($query) {
            $query->orderBy('is_main', 'desc');
        }])
        ->where('is_active', 1)
        ->where('stock_quantity', '>', 0)
        ->whereMonth('created_at', now()->month)   // ✅ chỉ trong tháng hiện tại
        ->whereYear('created_at', now()->year)     // ✅ và năm hiện tại
        ->latest()
        ->take($limit)
        ->get();
    }
}



if (!function_exists('get_related_products')) {
    function get_related_products($productId, $limit = 10)
    {
        $product = Product::with('categories')->find($productId);

        if (!$product) return collect();

        $categoryIds = $product->categories->pluck('id')->toArray();

        return Product::whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
            })
            ->where('id', '!=', $productId)
            ->with('brand', 'categories')
            ->distinct()
            ->take($limit)
            ->get();
    }
}


if (!function_exists('getAllOrdersWithPayment')) {
    function getAllOrdersWithPayment()
    {
        $user = Auth::guard('publish')->user(); 

        if (!$user) {
            return collect(); // Trả về danh sách rỗng nếu chưa đăng nhập
        }

        return \App\Models\Order::with(['user', 'payment', 'items.product'])
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();
    }
}