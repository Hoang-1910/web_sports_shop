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
        $cartItems = Cart::with('variant.product')
            ->where('user_id', Auth::id())
            ->get()
            ->filter(fn($item) => $item->variant); // Lọc ra chỉ những dòng còn variant

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

        if ($request->input('buy_now') == 1) {
            // Thêm vào giỏ xong chuyển sang checkout
            return redirect()->route('customer.checkout');
        }
        // Ngược lại, chỉ thêm vào giỏ và quay lại trang sản phẩm
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

    public function checkout(Request $request)
    {
        // Cập nhật số lượng
        $quantities = $request->input('quantities', []);
        foreach ($quantities as $cartId => $qty) {
            Cart::where('id', $cartId)
                ->where('user_id', auth()->id())
                ->update(['quantity' => max(1, (int)$qty)]);
        }
        // Chuyển sang trang checkout
        return redirect()->route('customer.checkout');
    }
    public function showCheckout()
    {
        $customer = Auth::user();
        $cartItems = Cart::with('variant.product')->where('user_id', Auth::id())->get();
        return view('customer.checkout', compact('customer', 'cartItems'));
    }
}
