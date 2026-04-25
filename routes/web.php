<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BagController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScarfController;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/login', [SiteController::class, 'login'])->name('login');
Route::post('/login', [SiteController::class, 'loginSubmit'])->name('login.submit');
Route::get('/register', [SiteController::class, 'register'])->name('register');
Route::post('/register', [SiteController::class, 'registerSubmit'])->name('register.submit');
Route::post('/logout', [SiteController::class, 'logout'])->name('logout');
Route::get('/profile', [SiteController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/profile', [SiteController::class, 'updateProfile'])->name('profile.update')->middleware('auth');
Route::get('/admin', [SiteController::class, 'admin'])->name('admin')->middleware('auth');
Route::get('/danh-muc/{slug}', [SiteController::class, 'category'])->name('category.show');

Route::middleware('auth')->group(function () {
    Route::get('/admin/categories/{category}/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/categories/{category}/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/categories/{category}/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/categories/{category}/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/categories/{category}/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/categories/{category}/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/categories/{category}/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});

// Routes cho Túi Xách
Route::resource('bags', BagController::class);

// Routes cho Khăn
Route::resource('scarves', ScarfController::class);

