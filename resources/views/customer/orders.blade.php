@extends('customer.layouts.app')

@section('title', 'Quản lý đơn hàng')

@section('content')
<nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
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
                                    <th>Mã đơn</th>
                                    <th>Ngày đặt</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng tiền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ([
                                    [
                                        'code' => 'DH001',
                                        'date' => '2024-06-01',
                                        'status' => 'Đang xử lý',
                                        'total' => 2450000
                                    ],
                                    [
                                        'code' => 'DH002',
                                        'date' => '2024-05-25',
                                        'status' => 'Đã giao',
                                        'total' => 3200000
                                    ],
                                    [
                                        'code' => 'DH003',
                                        'date' => '2024-05-10',
                                        'status' => 'Đã hủy',
                                        'total' => 1890000
                                    ]
                                ] as $order)
                                <tr>
                                    <td class="fw-semibold">{{ $order['code'] }}</td>
                                    <td>{{ date('d/m/Y', strtotime($order['date'])) }}</td>
                                    <td>
                                        @if($order['status'] === 'Đã giao')
                                            <span class="badge bg-success">{{ $order['status'] }}</span>
                                        @elseif($order['status'] === 'Đang xử lý')
                                            <span class="badge bg-warning text-dark">{{ $order['status'] }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $order['status'] }}</span>
                                        @endif
                                    </td>
                                    <td class="text-danger fw-bold">{{ number_format($order['total']) }}đ</td>
                                    <td>
                                        <a href="{{ route('orders.detail', ['code' => $order['code']]) }}" class="btn btn-sm btn-outline-danger px-3"><i class="bi bi-eye"></i> Xem</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ route('products.index') }}" class="btn btn-danger px-4"><i class="bi bi-shop me-2"></i>Tiếp tục mua sắm</a>
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