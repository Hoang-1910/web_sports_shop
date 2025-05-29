<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\Customer\ProductController;


// -------- ADMIN ----------//
Route::get('/admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    // thêm route admin khác tại đây
});

// -------- CUSTOMER ----------//
Route::get('/login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/login', [CustomerLoginController::class, 'login'])->name('customer.login.submit');
Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');


// Test front end
Route::get('/register', function() {
    return view('customer.register');
})->name('customer.register');

Route::post('/register', [CustomerLoginController::class, 'register'])->name('customer.register.submit');


//Trang chủ
Route::get('/', function () {
    return view('customer.home');
})->name('home');

// Sản phẩm
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Giỏ hàng
Route::get('/cart', function () {
    return view('customer.cart');
})->name('cart');

Route::get('/products/category/{slug}', [ProductController::class, 'category'])->name('products.category');
Route::get('/products/brand/{slug}', [ProductController::class, 'brand'])->name('products.brand');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//Route::get('/login', [AuthController::class, 'login'])->name('login');
//Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/brands', function () {
    return view('customer.test-layout');
})->name('brands.index'); // Added brands.index route