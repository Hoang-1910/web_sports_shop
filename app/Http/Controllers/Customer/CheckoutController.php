<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string',
        ]);

        $user = Auth::user();
        $cartItems = Cart::with('variant.product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính tổng tiền dựa trên giá biến thể!
        $total = $cartItems->sum(fn($item) => $item->variant->price * $item->quantity) + 30000;

        $order = Order::create([
            'user_id'        => $user->id,
            'total_amount'   => $total,
            'status'         => 'pending',
            'payment_method' => $request->payment_method,
            'order_date'     => now(),
            'name'           => $request->name,
            'phone'          => $request->phone,
            'address'        => $request->address,
        ]);

        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id'           => $order->id,
                'product_variant_id' => $item->variant->id,
                'quantity'           => $item->quantity,
                'price'              => $item->variant->price,
            ]);
        }

        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('customer.home')->with('success', 'Đặt hàng thành công!');
    }
}
