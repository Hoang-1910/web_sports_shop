@extends('customer.layouts.app')

@section('title', 'Giỏ hàng')

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('customer.home') }}" class="text-decoration-none">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </div>
    </nav>

    <!-- Cart Section -->
    <section class="cart-section py-5">
        <div class="container">
            <h1 class="section-title mb-4">Giỏ hàng của bạn</h1>

            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <form id="cartUpdateForm" action="{{ route('customer.cart.checkout') }}" method="POST">
                        @csrf
                        <div class="cart-items bg-white rounded-4 shadow-sm">
                            <!-- Cart Header -->
                            <div class="cart-header p-4 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="fw-bold mb-0">Sản phẩm</h5>
                                    </div>
                                    <div class="col-2 text-center">
                                        <h5 class="fw-bold mb-0">Đơn giá</h5>
                                    </div>
                                    <div class="col-2 text-center">
                                        <h5 class="fw-bold mb-0">Số lượng</h5>
                                    </div>
                                    <div class="col-2 text-center">
                                        <h5 class="fw-bold mb-0">Thành tiền</h5>
                                    </div>
                                </div>
                            </div>

                            <!-- Cart Items List -->
                            <div class="cart-items-list">
                                @foreach ($cartItems as $item)
                                    <div class="cart-item p-4 border-bottom">
                                        <div class="row align-items-center">
                                            <!-- Product Info -->
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="cart-item-img me-3" style="width: 80px; height: 80px;">
                                                        <img src="{{ asset('storage/' . $item->product->image) }}"
                                                            class="w-100 h-100 object-fit-cover rounded-3"
                                                            alt="{{ $item->product->name }}">
                                                    </div>
                                                    <div class="cart-item-info">
                                                        <h6 class="fw-semibold mb-1">
                                                            <a href="#"
                                                                class="text-decoration-none text-dark">{{ $item->product->name }}</a>
                                                        </h6>
                                                        <div class="text-muted small">
                                                            Size: {{ $item->variant->size ?? 'Không xác định' }} | Màu:
                                                            {{ $item->variant->color ?? 'Không xác định' }}
                                                        </div>
                                                        <form action="{{ route('customer.cart.remove') }}" method="POST"
                                                            class="d-inline remove-cart-form">
                                                            @csrf
                                                            <input type="hidden" name="cart_id"
                                                                value="{{ $item->id }}">
                                                            <button type="submit"
                                                                class="btn btn-link text-danger p-0 mt-2 remove-item">
                                                                <i class="fas fa-trash-alt me-1"></i>Xóa
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Price -->
                                            <div class="col-2 text-center">
                                                @if ($item->variant)
                                                    <div class="text-danger fw-bold item-price"
                                                        data-price="{{ $item->variant->price }}">
                                                        {{ number_format($item->variant->price) }}đ
                                                        @if ($item->variant->old_price && $item->variant->old_price > $item->variant->price)
                                                            <span
                                                                class="text-muted text-decoration-line-through small ms-1">
                                                                {{ number_format($item->variant->old_price) }}đ
                                                            </span>
                                                        @endif
                                                    </div>
                                                    @if ($item->variant->old_price && $item->variant->old_price > $item->variant->price)
                                                        <div class="text-success small">
                                                            Tiết kiệm
                                                            {{ number_format($item->variant->old_price - $item->variant->price) }}đ
                                                        </div>
                                                    @endif
                                                @else
                                                    <span class="text-danger">Biến thể không tồn tại</span>
                                                @endif
                                            </div>

                                            <!-- Quantity -->
                                            <div class="col-2">
                                                <div
                                                    class="quantity-control d-flex align-items-center justify-content-center">
                                                    <button type="button"
                                                        class="btn btn-outline-secondary btn-sm quantity-btn"
                                                        data-action="decrease">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <input type="number" name="quantities[{{ $item->id }}]"
                                                        class="form-control form-control-sm text-center mx-2 quantity-input"
                                                        value="{{ $item->quantity }}" min="1"
                                                        style="width: 60px; text-align: center;">
                                                    <button type="button"
                                                        class="btn btn-outline-secondary btn-sm quantity-btn"
                                                        data-action="increase">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Total -->
                                            <div class="col-2 text-center">
                                                <div class="text-danger fw-bold item-total">
                                                    {{ number_format($item->variant->price * $item->quantity) }}đ
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Cart Footer -->
                            <div class="cart-footer p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="btn btn-outline-danger" id="clearCart">
                                            <i class="fas fa-trash-alt me-2"></i>Xóa tất cả
                                        </button>
                                    </div>
                                    <div>
                                        <a href="{{ route('customer.products.index') }}" class="btn btn-outline-secondary">
                                            <i class="fas fa-arrow-left me-2"></i>Tiếp tục mua sắm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Checkout Button - Mobile -->
                        <div class="d-block d-lg-none mt-4">
                            <button type="submit" class="btn btn-danger w-100 py-3 fw-semibold">
                                <i class="fas fa-lock me-2"></i>Thanh toán ngay
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="order-summary bg-white rounded-4 shadow-sm p-4">
                        <h5 class="fw-bold mb-4">Tổng đơn hàng</h5>

                        <!-- Summary Details -->
                        <div class="summary-details mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Tạm tính:</span>
                                <span id="cartSubtotal" class="fw-semibold">
                                    {{ number_format($cartItems->sum(fn($item) => $item->variant->price * $item->quantity)) }}đ
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Phí vận chuyển:</span>
                                <span class="fw-semibold">30.000đ</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <span class="fw-bold">Tổng cộng:</span>
                                <span id="cartTotal" class="text-danger fw-bold fs-5">
                                    {{ number_format($cartItems->sum(fn($item) => $item->variant->price * $item->quantity) + 30000) }}đ
                                </span>
                            </div>
                        </div>

                        <!-- Checkout Button - Desktop -->
                        <button type="submit" form="cartUpdateForm" class="btn btn-danger w-100 py-3 fw-semibold">
                            <i class="fas fa-lock me-2"></i>Thanh toán ngay
                        </button>

                        <!-- Payment Methods -->
                        <div class="payment-methods mt-4">
                            <p class="text-muted small mb-2">Chấp nhận thanh toán:</p>
                            <div class="d-flex gap-2">
                                <div class="payment-method">
                                    <i class="fab fa-cc-visa text-primary fs-4"></i>
                                </div>
                                <div class="payment-method">
                                    <i class="fab fa-cc-mastercard text-warning fs-4"></i>
                                </div>
                                <div class="payment-method">
                                    <i class="fas fa-mobile-alt text-success fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
    <link href="{{ asset('customer/css/cart.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('customer/js/cart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.remove-cart-form').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Xóa',
                        cancelButtonText: 'Hủy',
                        confirmButtonColor: '#d33'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
