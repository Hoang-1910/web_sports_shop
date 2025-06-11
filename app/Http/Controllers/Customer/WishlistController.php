<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('customer.login')->with('error', 'Bạn cần đăng nhập');
        }

        $productId = $request->input('product_id');
        $user = Auth::user();

        $exists = Wishlist::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('warning', 'Sản phẩm đã có trong mục yêu thích!');
        }

        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Đã thêm vào mục yêu thích!');
    }

    public function remove(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('customer.login')->with('error', 'Bạn cần đăng nhập');
        }

        $productId = $request->input('product_id');
        $user = Auth::user();

        Wishlist::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->delete();

        return redirect()->back()->with('success', 'Đã xóa khỏi mục yêu thích!');
    }
}
