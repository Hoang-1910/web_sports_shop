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
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\Admin\BrandController;

// Trang chủ cho khách hàng (không cần login)
Route::get('/', [HomeController::class, 'index'])->name('customer.home');

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminLoginController;

// Hiển thị form login
Route::get('/admin', function () {
    return redirect()->route('admin.login');
});
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
// Xử lý đăng nhập
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

Route::get('/search', [CustomerProductController::class, 'search'])->name('customer.products.search');

// Đăng xuất
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
Route::middleware(['auth:admin', 'is_admin'])->prefix('admin')->as('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Quản lý sản phẩm (products) email: "admin1@example.com",
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products/import', [ProductController::class, 'import'])->name('products.import');

    // Route Product Variants
    Route::get('/products/{product}/variants/create', [ProductVariantController::class, 'create'])->name('variants.create');
    Route::post('/products/{product}/variants', [ProductVariantController::class, 'store'])->name('variants.store');
    Route::get('/variants/{variant}/edit', [ProductVariantController::class, 'edit'])->name('variants.edit');
    Route::put('/variants/{variant}', [ProductVariantController::class, 'update'])->name('variants.update');
    Route::delete('/variants/{variant}', [ProductVariantController::class, 'destroy'])->name('variants.destroy');
    Route::post('/variants/{variant}/images', [ProductVariantImageController::class, 'store'])->name('variants.images.store');
    Route::delete('/variants/images/{id}', [ProductVariantImageController::class, 'destroy'])->name('variants.images.destroy');
    Route::get('/variants/{variant}/images', [ProductVariantImageController::class, 'index'])->name('variants.images.index');
    Route::get('/variants/{variant}/images/create', [ProductVariantImageController::class, 'create'])->name('variants.images.create');
    Route::post('/variants/{variant}/images/store', [ProductVariantImageController::class, 'store'])->name('variants.images.store');
    Route::get('/variants/{variant}/images/{image}/edit', [ProductVariantImageController::class, 'edit'])->name('variants.images.edit');
    Route::put('/variants/images/{image}', [ProductVariantImageController::class, 'update'])->name('variants.images.update');
    Route::delete('/variants/images/{image}', [ProductVariantImageController::class, 'destroy'])->name('variants.images.destroy');
    Route::get('/variants/{variant}/images/{image}/show', [ProductVariantImageController::class, 'show'])->name('variants.images.show');
    Route::get('/variants/{variant}/images/{image}/edit', [ProductVariantImageController::class, 'edit'])->name('variants.images.edit');
    Route::delete('/variants/{variant}/images/{image}', [ProductVariantImageController::class, 'destroy'])->name('variants.images.destroy');
    Route::get('/variants/{variant}/images/{image}/show', [ProductVariantImageController::class, 'show'])->name('variants.images.show');
    Route::get('/variants/{variant}/images/{image}/edit', [ProductVariantImageController::class, 'edit'])->name('variants.images.edit');
    Route::put('/variants/images/{image}', [ProductVariantImageController::class, 'update'])->name('variants.images.update');

    // Quản lý danh mục (categories)
    Route::resource('categories', CategoryController::class);
    
    // Quản lý thương hiệu (brands)
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
    Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');
    // Quản lý đơn hàng (orders)
    Route::resource('orders', AdminOrderController::class);
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');


    // Route hiển thị đơn hàng
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');

    // Route cập nhật trạng thái đơn hàng
    Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    // Quản lý đánh giá (reviews)
    Route::resource('reviews', AdminReviewController::class);

    // Quản lý người dùng (users)
    Route::resource('users', UserController::class);
    Route::resource('dashboard1', DashboardController::class);

    //
    Route::get('/orders/export/excel', [AdminOrderController::class, 'exportExcel'])->name('orders.exportExcel');
    Route::get('/orders/export/pdf', [AdminOrderController::class, 'exportPdf'])->name('orders.exportPdf');
    Route::delete('/orders/delete-all', [AdminOrderController::class, 'deleteAll'])->name('orders.deleteAll');



    // Quản lý nhập kho
    Route::get('stock-imports', [\App\Http\Controllers\StockImportController::class, 'index'])->name('stock_imports.index');
    Route::get('stock-imports/create', [\App\Http\Controllers\StockImportController::class, 'create'])->name('stock_imports.create');
    Route::post('stock-imports', [\App\Http\Controllers\StockImportController::class, 'store'])->name('stock_imports.store');
    Route::delete('stock-imports/{id}', [\App\Http\Controllers\StockImportController::class, 'destroy'])->name('stock_imports.destroy');

    // Quản lý nhà cung cấp (suppliers)
    Route::resource('suppliers', \App\Http\Controllers\Admin\SupplierController::class);

    // Quản lý khuyến mãi (promotions)
    Route::resource('promotions', \App\Http\Controllers\Admin\PromotionController::class);
});


// -------- CUSTOMER ----------//
Route::get('/login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/login', [CustomerLoginController::class, 'login'])->name('customer.login.submit');
Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');
Route::get('/register', [CustomerRegisterController::class, 'showRegisterForm'])->name('customer.register');
Route::post('/register', [CustomerRegisterController::class, 'register'])->name('customer.register.submit');
Route::get('/products', [CustomerProductController::class, 'index'])->name('customer.products.index');
Route::get('/products/{id}', [CustomerProductController::class, 'show'])->name('customer.products.show');
Route::get('/brands/{brand}', [CustomerProductController::class, 'byBrand'])->name('customer.products.byBrand');
Route::get('/contact', [HomeController::class, 'contact'])->name('customer.contact');
// Customer Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('customer.wishlist.index');
Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('customer.wishlist.add');
Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('customer.wishlist.remove');
Route::get('/promotions', [\App\Http\Controllers\Customer\PromotionController::class, 'index'])->name('customer.promotions');
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

    // Customer Reviews
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('customer.reviews.store');
});
