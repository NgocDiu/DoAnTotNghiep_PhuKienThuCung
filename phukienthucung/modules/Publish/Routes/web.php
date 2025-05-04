<?php
use Modules\Publish\Http\Controllers\AuthController;
use Modules\Publish\Http\Controllers\PublishController;
/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Đăng ký và đăng nhập cho Publish module
|
*/


Route::group(['middleware' => 'web'], function() {
    // Đăng ký và đăng nhập cho Publish
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('publish.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('publish.register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/', [PublishController::class, 'index'])->name('publish.index');