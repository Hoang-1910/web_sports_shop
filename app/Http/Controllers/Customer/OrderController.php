<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // Đúng tên quan hệ bạn đã khai báo!
        $orders = Order::with('orderDetails.productVariant.product')
            ->where('user_id', auth()->id())
            ->get();

        return view('customer.orders', compact('orders'));
    }


    public function show($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->with(['orderDetails.productVariant.product'])
            ->firstOrFail();

        return view('customer.order-detail', compact('order'));
    }
    public function cancel($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->where('status', 'pending') // chỉ cho phép hủy đơn đang xử lý
            ->firstOrFail();

        $order->status = 'cancelled';
        $order->save();


        return redirect()->route('customer.orders.show', $order->id)
            ->with('success', 'Đơn hàng đã được hủy thành công!');
    }
}
