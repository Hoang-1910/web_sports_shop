<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('variant.product')->where('user_id', Auth::id())->get();
        return view('customer.cart', compact('cartItems'));
    }
    public function add(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để thêm vào giỏ hàng.');
        }

        $validated = $request->validate([
            'product_variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $userId = auth()->id();
        $variantId = $validated['product_variant_id'];
        $quantity = $validated['quantity'] ?? 1;

        $cartItem = Cart::firstOrNew([
            'user_id' => $userId,
            'product_variant_id' => $variantId,
        ]);

        if ($cartItem->exists) {
            $cartItem->quantity += $quantity;
        } else {
            $cartItem->quantity = $quantity;
        }
        $cartItem->save();

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('id', $validated['cart_id'])
            ->where('user_id', Auth::id())
            ->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'error' => 'Item not found']);
        }

        $cartItem->quantity = $validated['quantity'];
        $cartItem->save();

        return response()->json(['success' => true]);
    }



    public function remove(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id'
        ]);

        Cart::where('id', $request->cart_id)
            ->where('user_id', auth()->id())
            ->delete();

        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }
}
