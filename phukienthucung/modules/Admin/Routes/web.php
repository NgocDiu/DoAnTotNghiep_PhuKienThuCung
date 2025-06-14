<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AuthController;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\CartController;
use Modules\Admin\Http\Controllers\PermissionController;
use Modules\Admin\Http\Controllers\RoleController;
use Modules\Admin\Http\Controllers\UserRoleController;
use Modules\Admin\Http\Controllers\CategoryController;
use Modules\Admin\Http\Controllers\BrandController;
use Modules\Admin\Http\Controllers\AttributeController;
use Modules\Admin\Http\Controllers\ProductController;
use Modules\Admin\Http\Controllers\PageController;
use Modules\Admin\Http\Controllers\Menu;
use Modules\Admin\Http\Controllers\OrderController;
use Modules\Admin\Http\Controllers\SettingController;
use Modules\Admin\Http\Controllers\StockImportController;
use Modules\Admin\Http\Controllers\InventoryController;
use Modules\Admin\Http\Controllers\CustomerController;
use Modules\Admin\Http\Controllers\EmployeeController;
use Modules\Admin\Http\Controllers\ProductReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Đăng nhập và đăng ký admin (không cần auth)
Route::middleware('web')->group(function () {
    Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [AuthController::class, 'login']);
    Route::get('admin/register', [AuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('admin/register', [AuthController::class, 'register']);
});

// Sau khi đăng nhập bằng guard 'admin'
Route::middleware(['web', 'auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('orders', [CartController::class, 'index'])
        ->middleware('permission:order')
        ->name('orders.index');

    Route::resource('permissions', PermissionController::class)
        ->except(['show', 'create', 'edit'])
        ->middleware('permission:roles')
        ->names('permissions');

    Route::resource('roles', RoleController::class)
        ->middleware('permission:roles')
        ->names('roles');

    Route::get('users/roles', [UserRoleController::class, 'index'])
        ->middleware('permission:roles')
        ->name('users.roles');    

    Route::post('users/roles/{user}', [UserRoleController::class, 'update'])->name('users.roles.update');
    
    Route::get('/categories/profit-setting', [CategoryController::class, 'profitSetting'])
    ->middleware('permission:categories')
    ->name('categories.profit_setting');

    Route::post('/categories/update-profit/{category}', [CategoryController::class, 'updateProfit'])
    ->middleware('permission:categories')
    ->name('categories.update_profit');

    Route::resource('categories', CategoryController::class)
        ->middleware('permission:categories')
        ->names('categories');
    Route::post('/admin/categories/check-slug', [CategoryController::class, 'checkSlug'])->name('categories.checkSlug');

    Route::resource('brands', BrandController::class)
        ->except(['show', 'create', 'edit'])
        ->middleware('permission:brand')
        ->names('brands');
        Route::post('/admin/brands/check-name', [BrandController::class, 'checkName'])->name('brands.checkName');

    Route::resource('attributes', AttributeController::class)
        ->except(['show', 'create', 'edit'])
        ->middleware('permission:attribute')
        ->names('attributes');
    Route::post('/admin/attributes/check-name', [AttributeController::class, 'checkName'])->name('attributes.checkName');

    Route::resource('products', ProductController::class)
    ->except(['show', 'destroy'])
    ->middleware('permission:product')
    ->names('products');

// Route destroy riêng có middleware khác
    Route::delete('products/{product}', [ProductController::class, 'destroy'])
    ->middleware('permission:deleteProduct')
    ->name('products.destroy');
    Route::post('/admin/products/check-slug', [ProductController::class, 'checkSlug'])->name('products.checkSlug');

    Route::get('products/discounts', [ProductController::class, 'discounts'])
        ->middleware('permission:product')
        ->name('products.discounts');

    Route::post('products/discounts/{product}', [ProductController::class, 'updateDiscount'])
        ->middleware('permission:product')
        ->name('products.updateDiscount');

    Route::resource('menus', MenuController::class)
        ->except(['show'])
        ->middleware('permission:menu')
        ->names('menus');

    Route::resource('articles', ArticleController::class)
        ->except(['show'])
        ->middleware('permission:article')
        ->names('articles');

    Route::resource('pages', PageController::class)
        ->middleware('permission:page');

    Route::resource('order', PageController::class)
        ->middleware('permission:page');

    Route::get('orders', [OrderController::class, 'index'])
    ->middleware('permission:order')
    ->name('orders.index');
    
    Route::prefix('settings')->name('settings.')->middleware('permission:order')->group(function () {
        Route::get('/', [SettingController::class, 'edit'])->name('edit');       // Hiển thị form cấu hình
        Route::put('/', [SettingController::class, 'update'])->name('update');   // Lưu thay đổi
        Route::delete('/', [SettingController::class, 'destroy'])->name('destroy'); // Xóa cấu hình (nếu cần)
    });
    
    Route::post('orders/{order}/create-ghn', [OrderController::class, 'createGhnOrder'])
    ->middleware('permission:order')
    ->name('orders.ghn.create');
    Route::put('/orders/{order}/change-status', [OrderController::class, 'changeStatus'])->name('orders.change-status');


    Route::get('profile', [AuthController::class, 'editProfile'])->name('profile.edit');
    
    Route::put('profile', [AuthController::class, 'updateProfile'])->name('profile.update');

// Các route chung cho nhập hàng
    Route::resource('stock_imports', StockImportController::class)
        ->except(['destroy'])
        ->middleware('permission:stock_import');

    // Route xác nhận đơn nhập
    Route::post('stock_imports/{id}/confirm', [StockImportController::class, 'confirm'])
        ->middleware('permission:stock_confirm')
        ->name('stock_imports.confirm');

    // Route xóa đơn nhập – gán middleware riêng
    Route::delete('stock_imports/{id}', [StockImportController::class, 'destroy'])
        ->middleware('permission:stock_delete')
        ->name('stock_imports.destroy');

    Route::prefix('inventory')->name('inventory.')->group(function () {
        Route::get('/', [InventoryController::class, 'inventory']) ->middleware('permission:inventory')->name('index');
        Route::get('/imports', [InventoryController::class, 'importHistory']) ->middleware('permission:inventory')->name('imports');
        Route::get('/exports', [InventoryController::class, 'exportHistory']) ->middleware('permission:inventory')->name('exports');
    });
    Route::get('customers', [CustomerController::class, 'index'])->middleware('permission:customer')->name('customers.index');
    Route::put('customers/{id}', [CustomerController::class, 'update'])->middleware('permission:customer')->name('customers.update');
    
    Route::prefix('employees')->name('employees.')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->middleware('permission:employee')->name('index');
        Route::put('/{id}', [EmployeeController::class, 'update'])->middleware('permission:employee')->name('update');
        Route::delete('/{id}', [EmployeeController::class, 'destroy'])->middleware('permission:employee')->name('destroy');
    });
    Route::get('/product-reviews', [ProductReviewController::class, 'index'])->name('reviews.index');
    Route::resource('promotions', PromotionController::class)->middleware('permission:promotion')->names('promotions');
    // routes/web.php

    // web.php
    Route::get('/products/update-price', [ProductController::class, 'showUpdatePrice'])
    ->middleware('permission:product')
    ->name('products.update_price');
    Route::post('/products/update-price/{product}', [ProductController::class, 'handleUpdatePrice'])
    ->middleware('permission:product')
    ->name('products.handle_update_price');



});

Route::get('admin/promotions/check-code', [PromotionController::class, 'checkCode'])
    ->name('admin.promotions.checkCode');
