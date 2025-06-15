<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ProductVariantImageController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\Customer\CustomerRegisterController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\OrderController;

// Trang chủ cho khách hàng (không cần login)
Route::get('/', [HomeController::class, 'index'])->name('customer.home');

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminLoginController;

// Hiển thị form login
Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');


// Xử lý đăng nhập
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

// Đăng xuất
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
Route::middleware(['auth', 'is_admin'])->group(function () {


    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    // Quản lý sản phẩm (products) email: "admin1@example.com",
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
    Route::delete('/variants/{variant}/images/{image}', [ProductVariantImageController::class, 'destroy'])->name('admin.variants.images.destroy');
    Route::get('/variants/{variant}/images/{image}/show', [ProductVariantImageController::class, 'show'])->name('admin.variants.images.show');
    Route::get('/variants/{variant}/images/{image}/edit', [ProductVariantImageController::class, 'edit'])->name('admin.variants.images.edit');
    Route::put('/variants/images/{image}', [ProductVariantImageController::class, 'update'])->name('admin.variants.images.update');

    // Quản lý danh mục (categories)
    Route::resource('categories', CategoryController::class, ['as' => 'admin']);

    // Quản lý đơn hàng (orders)
    Route::resource('orders', OrderController::class, ['as' => 'admin']);
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');


    // Route hiển thị đơn hàng
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    // Route cập nhật trạng thái đơn hàng
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    // Quản lý đánh giá (reviews)
    Route::resource('reviews', ReviewController::class, ['as' => 'admin']);

    // Quản lý người dùng (users)
    Route::resource('users', UserController::class, ['as' => 'admin']);
    Route::resource('dashboard1', DashboardController::class, ['as' => 'admin']);

    //
    Route::get('/orders/export/excel', [OrderController::class, 'exportExcel'])->name('orders.exportExcel');
    Route::get('/orders/export/pdf', [OrderController::class, 'exportPdf'])->name('orders.exportPdf');
    Route::delete('/orders/delete-all', [OrderController::class, 'deleteAll'])->name('orders.deleteAll');
});


// -------- CUSTOMER ----------//
Route::get('/login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/login', [CustomerLoginController::class, 'login'])->name('customer.login.submit');
Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');
Route::get('/register', [CustomerRegisterController::class, 'showRegisterForm'])->name('customer.register');
Route::post('/register', [CustomerRegisterController::class, 'register'])->name('customer.register.submit');
Route::get('/products', [CustomerProductController::class, 'index'])->name('customer.products.index');
Route::get('/products/{id}', [CustomerProductController::class, 'show'])->name('customer.products.show');
Route::get('/contact', [HomeController::class, 'contact'])->name('customer.contact');
// Customer Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('customer.wishlist.index');
Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('customer.wishlist.add');
Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('customer.wishlist.remove');
Route::middleware(['auth', 'role:customer'])->group(function () {


    // Customer Orders
    Route::get('/orders', function () {
        return view('customer.orders');
    })->name('customer.orders');

    // Customer Profile
    Route::get('/profile', [HomeController::class, 'profile'])->name('customer.profile');
    Route::get('/profile/edit', [HomeController::class, 'profileEdit'])->name('customer.profile.edit');
    Route::post('/profile/update', [HomeController::class, 'profileUpdate'])->name('customer.profile.update');

    // Customer Cart
    Route::get('/cart', [CartController::class, 'index'])->name('customer.cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('customer.cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('customer.cart.remove');
    Route::post('/cart/update', [CartController::class, 'update'])->name('customer.cart.update');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('customer.cart.checkout');
    Route::get('/checkout', [CartController::class, 'showCheckout'])->name('customer.checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('customer.checkout.process');
    // Customer Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('customer.orders.show');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('customer.orders.cancel');
});

