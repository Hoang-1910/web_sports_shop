@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h2 class="text-2xl font-bold text-purple-700 mb-6 flex items-center gap-2">
         Chi tiết đơn hàng #{{ $order->code ?? $order->id }}
    </h2>

    <div class="grid md:grid-cols-2 gap-6 text-gray-700 text-base">
        <div>
            <p><span class="font-semibold"> Khách hàng:</span> {{ $order->user->name }}</p>
            <p><span class="font-semibold"> Tổng tiền:</span> {{ number_format($order->total_amount, 0, ',', '.') }} đ</p>
            <p><span class="font-semibold"> Thanh toán:</span> {{ strtoupper($order->payment_method) }}</p>
        </div>
        <div>
            <p><span class="font-semibold">Ngày đặt:</span> {{ $order->order_date ?? 'Chưa có' }}</p>
            <p><span class="font-semibold"> Ngày giao:</span> {{ $order->delivery_date ?? 'Chưa có' }}</p>
            <p><span class="font-semibold"> Trạng thái:</span>
                <span class="inline-block px-3 py-1 text-sm rounded-full bg-purple-100 text-purple-700 capitalize">
                    {{ $order->status }}
                </span>
            </p>
        </div>
    </div>

    <hr class="my-6 border-t-2 border-gray-200">

    <h3 class="text-xl font-semibold text-gray-800 mb-4">📦 Sản phẩm trong đơn:</h3>
    <ul class="space-y-4">
        @foreach ($order->orderDetails as $detail)
            <li class="border rounded-md p-4 bg-gray-50">
                <div class="font-medium text-gray-900">
                    {{ $detail->productVariant->product->name ?? 'SP không xác định' }}
                </div>
                <div class="text-sm text-gray-600">
                    Size:
                    <span class="italic">{{ $detail->productVariant->size ?? 'Không rõ size' }}</span> -
                    <span class="italic">{{ $detail->productVariant->color ?? 'Không rõ màu' }}</span>
                </div>
                <div class="text-sm mt-1">
                    <strong>Số lượng:</strong> {{ $detail->quantity }},
                    <strong>Thành tiền:</strong> {{ number_format($detail->quantity * $detail->price, 0, ',', '.') }} đ
                </div>
            </li>
        @endforeach
    </ul>

    <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}" class="mt-8 bg-purple-50 p-5 rounded-xl shadow-inner">
        @csrf
        @method('PUT')

        <label for="status" class="block mb-2 font-semibold text-gray-700"> Cập nhật trạng thái:</label>
        <div class="flex flex-col sm:flex-row gap-3 items-center">
            <select name="status" id="status"
                class="border border-gray-300 rounded-md px-4 py-2 w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-purple-500">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đã gửi</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã giao</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
            </select>
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-md transition duration-200">
                 Lưu
            </button>
        </div>

        @if(session('success'))
            <div class="mt-4 text-green-600 font-medium">
                 {{ session('success') }}
            </div>
        @endif
    </form>
</div>
@endsection
