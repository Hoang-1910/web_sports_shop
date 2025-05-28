<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CustomerLoginController;

// Trang chủ cho khách hàng (không cần login)
Route::get('/', fn() => view('customer.home'))->name('customer.home');

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
Route::get('/test-layout', [CustomerLoginController::class, 'testLayout'])->name('customer.testLayout');
