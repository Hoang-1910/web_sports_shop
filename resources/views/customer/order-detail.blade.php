@extends('customer.layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('customer.orders') }}">Đơn hàng của tôi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng #{{ $order->id }}</li>
            </ol>
        </div>
    </nav>

    <section class="order-detail-section py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-11">
                    <div class="card shadow-sm rounded-4 p-4">
                        <div
                            class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                            <div>
                                <h2 class="fw-bold mb-1 text-danger">Đơn hàng #{{ $order->id }}</h2>
                                <div class="text-muted mb-1">Ngày đặt: {{ $order->created_at->format('d/m/Y') }}</div>
                                <div>
                                    Trạng thái:
                                    @if ($order->status === 'delivered' || $order->status === 'Đã giao')
                                        <span class="badge bg-success">Đã giao</span>
                                    @elseif($order->status === 'pending' || $order->status === 'Đang xử lý')
                                        <span class="badge bg-warning text-dark">Đang xử lý</span>
                                    @elseif($order->status === 'canceled' || $order->status === 'Đã hủy')
                                        <span class="badge bg-danger">Đã hủy</span>
                                    @elseif($order->status === 'shipped' || $order->status === 'Đã vận chuyển')
                                        <span class="badge bg-primary">Đã vận chuyển</span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-md-end">
                                <div class="mb-1"><span class="text-muted">Tổng tiền:</span> <span
                                        class="fw-bold text-danger fs-5">{{ number_format($order->total_amount ?? $order->total) }}đ</span>
                                </div>
                                <div class="mb-1"><span class="text-muted">Phương thức:</span>
                                    {{ $order->payment_method }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">Địa chỉ nhận hàng</h5>
                            <div class="mb-1"><i class="bi bi-person me-2"></i>{{ $order->name }}</div>
                            <div class="mb-1"><i class="bi bi-telephone me-2"></i>{{ $order->phone }}</div>
                            <div><i class="bi bi-geo-alt me-2"></i>{{ $order->address }}</div>
                        </div>
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">Sản phẩm trong đơn</h5>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-end">Đơn giá</th>
                                            <th class="text-end">Thành tiền</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails ?? collect([]) as $item)
                                            <tr>
                                                <td>
                                                    @if ($item->productVariant && $item->productVariant->product)
                                                        <div class="d-flex align-items-center gap-3">
                                                            <img src="{{ asset('storage/' . $item->productVariant->product->image) }}"
                                                                alt="{{ $item->productVariant->product->name }}"
                                                                class="rounded-3 border" width="60" height="60">
                                                            <div>
                                                                <span
                                                                    class="fw-semibold">{{ $item->productVariant->product->name }}</span>
                                                                <div class="small text-muted">
                                                                    @if ($item->productVariant->size)
                                                                        Size: {{ $item->productVariant->size }}
                                                                    @endif
                                                                    @if ($item->productVariant->color)
                                                                        - Màu: {{ $item->productVariant->color }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <span class="text-danger">[Sản phẩm đã bị xóa]</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-end">{{ number_format($item->price) }}đ</td>
                                                <td class="text-end fw-bold">
                                                    {{ number_format($item->price * $item->quantity) }}đ</td>
                                                <td class="text-end">
                                                    @if ($order->status === 'pending' || $order->status === 'Đang xử lý')
                                                        <form action="{{ route('customer.orders.cancel', $order->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này?')">
                                                                <i class="bi bi-x-circle"></i> Hủy đơn hàng
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="{{ route('customer.orders') }}" class="btn btn-outline-danger px-4"><i
                                    class="bi bi-arrow-left me-2"></i>Quay lại danh sách đơn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link href="{{ asset('customer/css/order-detail.css') }}" rel="stylesheet">
@endpush
