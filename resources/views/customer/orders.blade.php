@extends('customer.layouts.app')

@section('title', 'Quản lý đơn hàng')

@section('content')
    <nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đơn hàng của tôi</li>
            </ol>
        </div>
    </nav>

    <section class="orders-section py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm rounded-4 p-4">
                        <h2 class="fw-bold mb-4 text-danger"><i class="bi bi-bag me-2"></i>Đơn hàng của tôi</h2>
                        <div class="table-responsive">
                            <table class="table align-middle table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Mã đơn</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td class="fw-semibold text-center">{{ $order->id }}</td>
                                            <td>
                                                @php
                                                    // Gom sản phẩm cùng loại
                                                    $products = collect();
                                                    foreach ($order->orderDetails ?? collect([]) as $detail) {
                                                        if (
                                                            $detail->productVariant &&
                                                            $detail->productVariant->product
                                                        ) {
                                                            $productId = $detail->productVariant->product->id;
                                                            if (!$products->has($productId)) {
                                                                $products->put($productId, [
                                                                    'name' => $detail->productVariant->product->name,
                                                                    'variants' => [],
                                                                ]);
                                                            }
                                                            // Đúng cách: lấy mảng ra, thêm phần tử, rồi put lại
                                                            $item = $products->get($productId);
                                                            $item['variants'][] = $detail;
                                                            $products->put($productId, $item);
                                                        }
                                                    }

                                                @endphp
                                                @forelse ($products as $prod)
                                                    <div>
                                                        <strong>{{ $prod['name'] }}</strong>
                                                        @foreach ($prod['variants'] as $variant)
                                                            <div class="small text-muted ms-2">
                                                                @if ($variant->productVariant->size)
                                                                    Size: {{ $variant->productVariant->size }}
                                                                @endif
                                                                @if ($variant->productVariant->color)
                                                                    - Màu: {{ $variant->productVariant->color }}
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @empty
                                                    <div class="text-danger">[Sản phẩm đã bị xóa]</div>
                                                @endforelse
                                            </td>
                                            <td>
                                                @php
                                                    // Đếm tổng số lượng cho từng sản phẩm
                                                    $productQuantities = [];
                                                    foreach ($order->orderDetails ?? collect([]) as $detail) {
                                                        if (
                                                            $detail->productVariant &&
                                                            $detail->productVariant->product
                                                        ) {
                                                            $productName = $detail->productVariant->product->name;
                                                            if (!isset($productQuantities[$productName])) {
                                                                $productQuantities[$productName] = 0;
                                                            }
                                                            $productQuantities[$productName] += $detail->quantity;
                                                        }
                                                    }
                                                @endphp
                                                @forelse ($productQuantities as $name => $qty)
                                                    <div><span class="badge bg-secondary">{{ $qty }}</span></div>
                                                @empty
                                                    <div class="text-muted">0</div>
                                                @endforelse
                                            </td>
                                            <td>{{ $order->created_at ? $order->created_at->format('d/m/Y') : '' }}</td>
                                            <td>
                                                @if ($order->status === 'delivered' || $order->status === 'Đã giao')
                                                    <span class="badge bg-success">Đã giao</span>
                                                @elseif($order->status === 'pending' || $order->status === 'Đang xử lý')
                                                    <span class="badge bg-warning text-dark">Đang xử lý</span>
                                                @else
                                                    <span class="badge bg-danger">Đã hủy</span>
                                                @endif
                                            </td>
                                            <td class="text-danger fw-bold">
                                                {{ number_format($order->total_amount ?? $order->total) }}đ</td>
                                            <td>
                                                <a href="{{ route('customer.orders.show', $order->id) }}"
                                                    class="btn btn-sm btn-outline-danger px-3">
                                                    <i class="bi bi-eye"></i> Xem
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">Bạn chưa có đơn hàng nào.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="{{ route('customer.products.index') }}" class="btn btn-danger px-4">
                                <i class="bi bi-shop me-2"></i>Tiếp tục mua sắm
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link href="{{ asset('customer/css/orders.css') }}" rel="stylesheet">
@endpush
