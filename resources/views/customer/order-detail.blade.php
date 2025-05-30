@extends('customer.layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('orders') }}">Đơn hàng của tôi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng DH001</li>
        </ol>
    </div>
</nav>

<section class="order-detail-section py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">
                <div class="card shadow-sm rounded-4 p-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                        <div>
                            <h2 class="fw-bold mb-1 text-danger">Đơn hàng #DH001</h2>
                            <div class="text-muted mb-1">Ngày đặt: 01/06/2024</div>
                            <div>
                                Trạng thái: <span class="badge bg-warning text-dark">Đang xử lý</span>
                            </div>
                        </div>
                        <div class="text-md-end">
                            <div class="mb-1"><span class="text-muted">Tổng tiền:</span> <span class="fw-bold text-danger fs-5">2.450.000đ</span></div>
                            <div class="mb-1"><span class="text-muted">Phương thức:</span> Thanh toán khi nhận hàng</div>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Địa chỉ nhận hàng</h5>
                        <div class="mb-1"><i class="bi bi-person me-2"></i>Khách Demo</div>
                        <div class="mb-1"><i class="bi bi-telephone me-2"></i>0123 456 789</div>
                        <div><i class="bi bi-geo-alt me-2"></i>123 Đường ABC, Quận 1, TP.HCM</div>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ([
                                        [
                                            'name' => 'Nike Air Zoom Pegasus 38',
                                            'image' => '/customer/images/product1.jpg',
                                            'qty' => 1,
                                            'price' => 2450000
                                        ]
                                    ] as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="rounded-3 border" width="60" height="60">
                                                <span class="fw-semibold">{{ $item['name'] }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $item['qty'] }}</td>
                                        <td class="text-end">{{ number_format($item['price']) }}đ</td>
                                        <td class="text-end fw-bold">{{ number_format($item['price'] * $item['qty']) }}đ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-6 col-lg-5">
                            <div class="bg-light rounded-3 p-3 mb-2">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Tạm tính</span>
                                    <span>2.450.000đ</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Phí vận chuyển</span>
                                    <span>0đ</span>
                                </div>
                                <div class="d-flex justify-content-between fw-bold fs-5">
                                    <span>Tổng cộng</span>
                                    <span class="text-danger">2.450.000đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ route('orders') }}" class="btn btn-outline-danger px-4"><i class="bi bi-arrow-left me-2"></i>Quay lại danh sách đơn</a>
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