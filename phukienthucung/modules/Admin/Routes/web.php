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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Đăng nhập và đăng ký (không cần auth)
Route::middleware('web')->group(function () {
    Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [AuthController::class, 'login']);
    Route::get('admin/register', [AuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('admin/register', [AuthController::class, 'register']);
});

// Các route yêu cầu đã đăng nhập với guard 'admin'
Route::middleware(['web', 'auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // Quản lý đơn hàng (có thêm middleware permission riêng)
    Route::get('orders', [CartController::class, 'index'])
        ->middleware('permission:order')
        ->name('orders.index');

    // Permissions
    Route::resource('permissions', PermissionController::class)
        ->except(['show', 'create', 'edit'])
        ->middleware('permission:roles')
        ->names('permissions');

    // Roles
    Route::resource('roles', RoleController::class)
         ->middleware('permission:roles')
        ->names('roles');

    // Phân quyền người dùng
    Route::get('users/roles', [UserRoleController::class, 'index'])
        ->middleware('permission:roles')
        ->name('users.roles');    
    Route::post('users/roles/{user}', [UserRoleController::class, 'update'])->name('users.roles.update');

    Route::resource('categories', CategoryController::class)
        ->middleware('permission:categories')
        ->names('categories');

    Route::resource('brands', BrandController::class)
        ->except(['show', 'create', 'edit'])
        ->middleware('permission:brand')
        ->names('brands');

    Route::resource('attributes', AttributeController::class)
        ->except(['show', 'create', 'edit'])
        ->middleware('permission:attribute')
        ->names('attributes');
        
    Route::resource('products', ProductController::class)
        ->except(['show'])    
        ->middleware('permission:product')
        ->names('products');

    Route::get('products/discounts', [ProductController::class, 'discounts'])
        ->middleware('permission:product')
        ->name('products.discounts');

    Route::post('products/discounts/{product}', [ProductController::class, 'updateDiscount'])
        ->middleware('permission:product')
        ->name('products.updateDiscount');



});
