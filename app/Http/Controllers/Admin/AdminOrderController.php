<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['user', 'orderDetails.productVariant.product']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q2) use ($search) {
                $q2->where('name', 'like', "%$search%");
            });
        }

        $orders = $query->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }


    public function show($id)
    {
        $order = Order::with(['user', 'orderDetails.productVariant.product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order = Order::with('orderDetails.productVariant')->findOrFail($id);

        // Nếu trạng thái mới là "delivered" và trạng thái cũ chưa phải "delivered" => trừ kho
        if ($request->status === 'delivered' && $order->status !== 'delivered') {
            foreach ($order->orderDetails as $detail) {
                $variant = $detail->productVariant;
                if ($variant) {
                    // Trừ tồn kho
                    $variant->stock = max(0, ($variant->stock ?? 0) - $detail->quantity);
                    $variant->save();
                }
            }
        }

        // Cập nhật trạng thái đơn hàng
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Xóa đơn hàng thành công.');
    }
}
