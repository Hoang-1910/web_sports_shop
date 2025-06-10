<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ProductVariantImageController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\Customer\CustomerRegisterController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;

// Trang chủ cho khách hàng (không cần login)
Route::get('/', [HomeController::class, 'index'])->name('customer.home');

// -------- ADMIN ----------//
Route::get('/admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    // Route Products
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::post('/admin/products/import', [ProductController::class, 'import'])->name('admin.products.import');

    // Route Product Variants
    Route::get('/products/{product}/variants/create', [ProductVariantController::class, 'create'])->name('admin.variants.create');
    Route::post('/products/{product}/variants', [ProductVariantController::class, 'store'])->name('admin.variants.store');
    Route::get('/variants/{variant}/edit', [ProductVariantController::class, 'edit'])->name('admin.variants.edit');
    Route::put('/variants/{variant}', [ProductVariantController::class, 'update'])->name('admin.variants.update');
    Route::delete('/variants/{variant}', [ProductVariantController::class, 'destroy'])->name('admin.variants.destroy');
    Route::post('/variants/{variant}/images', [ProductVariantImageController::class, 'store'])->name('admin.variants.images.store');
    Route::delete('/variants/images/{id}', [ProductVariantImageController::class, 'destroy'])->name('admin.variants.images.destroy');
    Route::get('/variants/{variant}/images', [ProductVariantImageController::class, 'index'])->name('admin.variants.images.index');
    Route::get('/variants/{variant}/images/create', [ProductVariantImageController::class, 'create'])->name('admin.variants.images.create');
    Route::post('/variants/{variant}/images/store', [ProductVariantImageController::class, 'store'])->name('admin.variants.images.store');
    Route::get('/variants/{variant}/images/{image}/edit', [ProductVariantImageController::class, 'edit'])->name('admin.variants.images.edit');
    Route::put('/variants/images/{image}', [ProductVariantImageController::class, 'update'])->name('admin.variants.images.update');
    Route::delete('/variants/images/{image}', [ProductVariantImageController::class, 'destroy'])->name('admin.variants.images.destroy');
    Route::get('/variants/{variant}/images/{image}/show', [ProductVariantImageController::class, 'show'])->name('admin.variants.images.show');
    Route::get('/variants/{variant}/images/{image}/edit', [ProductVariantImageController::class, 'edit'])->name('admin.variants.images.edit');

    //Route Categories
    Route::get('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});

// -------- CUSTOMER ----------//
Route::get('/login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/login', [CustomerLoginController::class, 'login'])->name('customer.login.submit');
Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');
Route::get('/register', [CustomerRegisterController::class, 'showRegisterForm'])->name('customer.register');
Route::post('/register', [CustomerRegisterController::class, 'register'])->name('customer.register.submit');
Route::get('/products', [CustomerProductController::class, 'index'])->name('customer.products.index');
Route::get('/products/{id}', [CustomerProductController::class, 'show'])->name('customer.products.show');
Route::middleware(['auth', 'role:customer'])->group(function () {
    // Customer Profile
    Route::get('/profile', function () {
        return view('customer.profile');
    })->name('customer.profile');

    // Customer Orders
    Route::get('/orders', function () {
        return view('customer.orders');
    })->name('customer.orders');

    // Customer Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('customer.wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('customer.wishlist.add');
    Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('customer.wishlist.remove');
});
