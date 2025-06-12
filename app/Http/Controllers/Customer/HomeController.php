<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\News;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {

        // Lấy 8 sản phẩm mới nhất
        $featuredProducts = Product::orderBy('created_at', 'desc')
            ->take(8)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image ?? '/customer/images/default-product.jpg',
                    'price' => $product->price,
                    'discount' => $product->discount,
                    // Nếu muốn test badge trên giao diện thì gán tạm cứng: 'badges' => ['NEW'],
                    'badges' => [],
                ];
            });
        $wishlistProductIds = Auth::check()
            ? Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray()
            : [];


        return view('customer.home', compact('featuredProducts', 'wishlistProductIds'));
    }

    public function contact()
    {
        return view('customer.contact');
    }

    public function profile()
    {
        $customer = Auth::user();
        return view('customer.profile', compact('customer'));
    }
    public function profileEdit()
    {
        $customer = Auth::user();
        return view('customer.profile_edit', compact('customer'));
    }
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $customer = Auth::user();
        $customer->update($request->only('name', 'email', 'phone', 'address'));

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    }
}
