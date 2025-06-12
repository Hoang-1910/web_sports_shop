{{-- filepath: resources/views/customer/checkout.blade.php --}}
@extends('customer.layouts.app')

@section('title', 'Thanh toán đơn hàng')

@section('content')
<nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('customer.cart.index') }}">Giỏ hàng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
        </ol>
    </div>
</nav>

<section class="checkout-section py-5">
    <div class="container">
        <h1 class="section-title mb-4">Thanh toán đơn hàng</h1>
        <div class="row">
            <!-- Thông tin giao hàng -->
            <div class="col-lg-7 mb-4">
                <div class="card shadow-sm rounded-4 p-4">
                    <h5 class="fw-bold mb-3">Thông tin giao hàng</h5>
                    <form action="{{ route('customer.checkout.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ giao hàng</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address', $customer->address ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ghi chú (tuỳ chọn)</label>
                            <textarea name="note" class="form-control" rows="2">{{ old('note') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phương thức thanh toán</label>
                            <select name="payment_method" class="form-select" required>
                                <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                                <option value="bank">Chuyển khoản ngân hàng</option>
                                {{-- <option value="momo">Ví MoMo</option> --}}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger px-4 py-2 fw-semibold w-100 mt-3">
                            Xác nhận đặt hàng
                        </button>
                    </form>
                </div>
            </div>
            <!-- Tóm tắt đơn hàng -->
            <div class="col-lg-5">
                <div class="order-summary bg-white rounded-4 shadow-sm p-4">
                    <h5 class="fw-bold mb-4">Tóm tắt đơn hàng</h5>
                    <div class="mb-3">
                        @foreach($cartItems as $item)
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" width="48" height="48" class="rounded me-3" style="object-fit:cover;">
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">{{ $item->product->name }}</div>
                                    <div class="text-muted small">
                                        Số lượng: {{ $item->quantity }} | 
                                        {{ number_format($item->product->price) }}đ
                                    </div>
                                </div>
                                <div class="fw-bold text-danger ms-2">
                                    {{ number_format($item->product->price * $item->quantity) }}đ
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Tạm tính:</span>
                        <span class="fw-semibold">{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity)) }}đ</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Phí vận chuyển:</span>
                        <span class="fw-semibold">30.000đ</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Giảm giá:</span>
                        <span class="text-danger">0đ</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Tổng cộng:</span>
                        <span class="text-danger fw-bold fs-5">
                            {{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity) + 30000) }}đ
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection