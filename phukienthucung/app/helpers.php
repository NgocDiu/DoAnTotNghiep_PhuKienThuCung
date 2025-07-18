<?php
use App\Models\Menu;
use App\Models\Category;
use App\Models\Article;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;


if (!function_exists('module_asset')) {
    function module_asset($path)
    {
        return asset('modules/' . str_replace('::', '/', $path));
    }
}
//Lấy menu cha
if (!function_exists('getParentMenusWithCategory')) {
    function getParentMenusWithCategory()
    {
        return Menu::with(['category', 'page']) // thêm 'page' ở đây
            ->where('is_active', 1)
            ->orderBy('position')
            ->get();
    }
}
//Lấy category cha

if (!function_exists('getParentCategories')) {
    function getParentCategories()
    {
    return Category::whereNull('parent_id')->orderBy('id')->get();
    }
}
//Lấy category con
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
    function getNewProductsWithImage()
    {
        return \App\Models\Product::with(['images' => function ($query) {
                $query->orderBy('is_main', 'desc');
            }])
            ->where('is_active', 1)
            ->where('stock_quantity', '>', 0)
            ->where('created_at', '>=', now()->subMonths(3)) // ✅ trong 3 tháng gần nhất
            ->latest()
            ->get(); // ✅ bỏ take($limit) để lấy hết
    }
}


if (!function_exists('getBestSellingProductsWithImage')) {
    function getBestSellingProductsWithImage($limit = 8)
    {
        return \App\Models\Product::with(['images' => function ($query) {
                $query->orderBy('is_main', 'desc');
            }])
            ->where('is_active', 1)
            ->where('stock_quantity', '>', 0)
            ->withCount(['orderItems as total_sold' => function ($query) {
                $query->select(\DB::raw("SUM(quantity)"));
            }])
            ->orderByDesc('total_sold')
            ->take($limit)
            ->get();
    }
}

if (!function_exists('getFeaturedProductsWithImage')) {
    function getFeaturedProductsWithImage($limit = 8)
    {
        return \App\Models\Product::with(['images' => function ($query) {
                $query->orderBy('is_main', 'desc');
            }])
            ->withAvg('reviews', 'rating') // 📌 Laravel tự join bảng reviews
            ->where('is_active', 1)
            ->where('stock_quantity', '>', 0)
            ->orderByDesc('reviews_avg_rating') // sắp xếp theo rating trung bình
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
if (!function_exists('ghn_setting')) {
    function ghn_setting()
    {
        return \App\Models\Setting::first();
    }
}
