<?php

use Illuminate\Support\Facades\Route;
use Modules\Publish\Http\Controllers\AuthController;
use Modules\Publish\Http\Controllers\PublishController;
use Modules\Publish\Http\Controllers\ArticleController;
use Modules\Publish\Http\Controllers\PageController;
use Modules\Publish\Http\Controllers\ProductController;
use Modules\Publish\Http\Controllers\CartController;
use Modules\Publish\Http\Controllers\InformationController;
use Modules\Publish\Http\Controllers\CheckoutController;
use Modules\Admin\Http\Controllers\OrderController;
use Modules\Publish\Http\Controllers\ProductReviewController;

Route::middleware('web')->group(function () {

    // Trang chủ
    Route::get('/', [PublishController::class, 'index'])->name('publish.index');

    // Đăng nhập/Đăng ký (không cần auth)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('publish.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('publish.register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('publish.logout');

    // Trang nội dung
    Route::get('/bai-viet', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/bai-viet/{slug}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/trang/{slug}', [PageController::class, 'show'])->name('page.show');
    Route::get('/san-pham/{slug}', [ProductController::class, 'show'])->name('product.show');

    // API địa chỉ
    Route::post('/api/get-districts', [InformationController::class, 'getDistricts']);
    Route::post('/api/get-wards', [InformationController::class, 'getWards']);

    // ✅ Nhóm route cần đăng nhập với guard publish
    Route::middleware('auth:publish')->group(function () {

        // Giỏ hàng
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
        Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
        Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

        // Thông tin người dùng
        Route::get('/information', [InformationController::class, 'index'])->name('information');
        Route::post('/information/address/store', [InformationController::class, 'storeAddress'])->name('address.store');
        Route::post('/information/address/update/{id}', [InformationController::class, 'updateAddress'])->name('address.update');
        Route::delete('/information/address/delete/{id}', [InformationController::class, 'deleteAddress'])->name('address.delete');

        // Thanh toán
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
        Route::get('/checkout/retry-vnpay/{order}', [CheckoutController::class, 'retryVnpay'])->name('checkout.vnpay.retry');
        Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
    });

    // ✅ Không cần đăng nhập - callback từ VNPAY
    Route::get('/checkout/vnpay-return', [CheckoutController::class, 'vnpayReturn'])
        ->name('checkout.vnpay.return');
    Route::put('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    
    Route::post('/product-reviews', [ProductReviewController::class, 'store'])->name('product-reviews.store');
    //category
    Route::get('cat/{slug}', [ProductController::class, 'category'])
    ->name('products.by-category');

});
