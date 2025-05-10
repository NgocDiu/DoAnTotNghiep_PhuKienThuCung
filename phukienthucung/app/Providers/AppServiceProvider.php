<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // ✅ Đây là dòng bạn cần
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         View::composer('*', function ($view) {
        $count = 0;

        if (Auth::guard('publish')->check()) {
            $userId = Auth::guard('publish')->id();
            $cart = Cart::where('user_id', $userId)->withCount('items')->first();
            $count = $cart ? $cart->items_count : 0;
        }

        $view->with('cartCount', $count);
    });
        Paginator::useBootstrap(); // hoặc useBootstrapFive() nếu dùng Bootstrap 5
    }
}
