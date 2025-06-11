<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('customer.layouts.nav', function ($view) {
            $categories = Category::orderBy('name')->get();

            // Lấy dữ liệu wishlist và cart cho user hiện tại
            $wishlistItems = collect();
            $wishlistCount = 0;
            $cartItems = collect();
            $cartCount = 0;

            if (Auth::check()) {
                $wishlistItems = Wishlist::with('product')->where('user_id', Auth::id())->get();
                $wishlistCount = $wishlistItems->count();

                $cartItems = Cart::with('variant.product')->where('user_id', Auth::id())->get();
                $cartCount = $cartItems->sum('quantity');
            }

            $view->with([
                'categories' => $categories,
                'wishlistItems' => $wishlistItems,
                'wishlistCount' => $wishlistCount,
                'cartItems' => $cartItems,
                'cartCount' => $cartCount,
            ]);
        });
    }
}
