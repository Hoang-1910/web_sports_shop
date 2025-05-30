@extends('customer.layouts.app')

@section('title', 'Giỏ hàng')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Trang chủ</a></li>
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
                        @php
                        $cartItems = [
                            [
                                'id' => 1,
                                'name' => 'Nike Air Zoom Pegasus 38',
                                'image' => '/customer/images/product1.jpg',
                                'price' => 2450000,
                                'quantity' => 1,
                                'size' => '42',
                                'color' => 'Đen'
                            ],
                            [
                                'id' => 2,
                                'name' => 'Adidas Ultraboost 21',
                                'image' => '/customer/images/product2.jpg',
                                'price' => 3200000,
                                'quantity' => 2,
                                'size' => '41',
                                'color' => 'Trắng'
                            ]
                        ];
                        @endphp

                        @foreach($cartItems as $item)
                        <div class="cart-item p-4 border-bottom">
                            <div class="row align-items-center">
                                <!-- Product Info -->
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="cart-item-img me-3" style="width: 80px; height: 80px;">
                                            <img src="{{ $item['image'] }}" 
                                                 class="w-100 h-100 object-fit-cover rounded-3" 
                                                 alt="{{ $item['name'] }}">
                                        </div>
                                        <div class="cart-item-info">
                                            <h6 class="fw-semibold mb-1">
                                                <a href="#" class="text-decoration-none text-dark">{{ $item['name'] }}</a>
                                            </h6>
                                            <div class="text-muted small">
                                                Size: {{ $item['size'] }} | Màu: {{ $item['color'] }}
                                            </div>
                                            <button class="btn btn-link text-danger p-0 mt-2 remove-item" 
                                                    data-product-id="{{ $item['id'] }}">
                                                <i class="fas fa-trash-alt me-1"></i>Xóa
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="col-2 text-center">
                                    <div class="text-danger fw-bold">
                                        {{ number_format($item['price']) }}đ
                                    </div>
                                </div>

                                <!-- Quantity -->
                                <div class="col-2">
                                    <div class="quantity-control d-flex align-items-center justify-content-center">
                                        <button class="btn btn-outline-secondary btn-sm quantity-btn" 
                                                data-action="decrease">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" 
                                               class="form-control form-control-sm text-center mx-2" 
                                               value="{{ $item['quantity'] }}" 
                                               min="1" 
                                               max="10"
                                               style="width: 60px;">
                                        <button class="btn btn-outline-secondary btn-sm quantity-btn" 
                                                data-action="increase">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Total -->
                                <div class="col-2 text-center">
                                    <div class="text-danger fw-bold">
                                        {{ number_format($item['price'] * $item['quantity']) }}đ
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
                                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Tiếp tục mua sắm
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="order-summary bg-white rounded-4 shadow-sm p-4">
                    <h5 class="fw-bold mb-4">Tổng đơn hàng</h5>
                    
                    <!-- Summary Details -->
                    <div class="summary-details mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Tạm tính:</span>
                            <span class="fw-semibold">8.900.000đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Phí vận chuyển:</span>
                            <span class="fw-semibold">30.000đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Giảm giá:</span>
                            <span class="text-danger">-500.000đ</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold">Tổng cộng:</span>
                            <span class="text-danger fw-bold fs-5">8.430.000đ</span>
                        </div>
                    </div>

                    <!-- Coupon Code -->
                    <div class="coupon-code mb-4">
                        <div class="input-group">
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="Nhập mã giảm giá">
                            <button class="btn btn-outline-danger">Áp dụng</button>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <button class="btn btn-danger w-100 py-3 fw-semibold">
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
/* Cart Item Styles */
.cart-item {
    transition: all 0.3s ease;
}

.cart-item:hover {
    background-color: #f8f9fa;
}

.quantity-control {
    max-width: 150px;
    margin: 0 auto;
}

.quantity-btn {
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.quantity-btn:hover {
    background-color: #dc3545;
    color: white;
    border-color: #dc3545;
}

/* Order Summary Styles */
.order-summary {
    position: sticky;
    top: 100px;
}

.summary-details {
    background-color: #f8f9fa;
    padding: 1rem;
    border-radius: 0.5rem;
}

.payment-method {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.payment-method:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* Responsive Adjustments */
@media (max-width: 991.98px) {
    .order-summary {
        position: static;
        margin-top: 2rem;
    }
}

@media (max-width: 767.98px) {
    .cart-header {
        display: none;
    }
    
    .cart-item {
        padding: 1rem;
    }
    
    .cart-item .row {
        flex-direction: column;
    }
    
    .cart-item .col-6 {
        width: 100%;
        margin-bottom: 1rem;
    }
    
    .cart-item .col-2 {
        width: 100%;
        text-align: left !important;
        margin-top: 0.5rem;
    }
    
    .quantity-control {
        justify-content: flex-start;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quantity Controls
    const quantityBtns = document.querySelectorAll('.quantity-btn');
    quantityBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.parentElement.querySelector('input');
            const currentValue = parseInt(input.value);
            const action = this.dataset.action;
            
            if (action === 'increase' && currentValue < 10) {
                input.value = currentValue + 1;
            } else if (action === 'decrease' && currentValue > 1) {
                input.value = currentValue - 1;
            }
            
            // Trigger change event to update totals
            input.dispatchEvent(new Event('change'));
        });
    });
    
    // Remove Item
    const removeButtons = document.querySelectorAll('.remove-item');
    removeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const cartItem = this.closest('.cart-item');
            cartItem.style.opacity = '0';
            setTimeout(() => {
                cartItem.remove();
                updateCartTotals();
            }, 300);
        });
    });
    
    // Clear Cart
    const clearCartBtn = document.getElementById('clearCart');
    if (clearCartBtn) {
        clearCartBtn.addEventListener('click', function() {
            if (confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm trong giỏ hàng?')) {
                const cartItems = document.querySelectorAll('.cart-item');
                cartItems.forEach(item => {
                    item.style.opacity = '0';
                    setTimeout(() => item.remove(), 300);
                });
                updateCartTotals();
            }
        });
    }
    
    // Update Cart Totals
    function updateCartTotals() {
        // Implement cart total calculation logic here
        console.log('Updating cart totals...');
    }
    
    // Quantity Input Change
    const quantityInputs = document.querySelectorAll('.quantity-control input');
    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            const value = parseInt(this.value);
            if (value < 1) this.value = 1;
            if (value > 10) this.value = 10;
            updateCartTotals();
        });
    });
});
</script>
@endpush 