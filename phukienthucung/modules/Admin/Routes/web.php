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
    Route::get('/', [AdminController::class, 'index'])->middleware('permission:order')->name('index');

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
});

