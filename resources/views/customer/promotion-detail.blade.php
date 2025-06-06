@extends('customer.layouts.app')

@section('title', 'Chi tiết khuyến mãi')

@section('content')
<!-- Hero Banner -->
<section class="promo-detail-hero position-relative py-5" style="background: linear-gradient(135deg, #e53935 0%, #c62828 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 text-white">
                <div class="promo-badge mb-3">
                    <span class="badge bg-light text-danger px-3 py-2">
                        <i class="fas fa-fire me-2"></i>Đang diễn ra
                    </span>
                </div>
                <h1 class="display-4 fw-bold mb-3">Siêu Sale Tháng 3</h1>
                <p class="lead mb-4">Khuyến mãi đặc biệt dành cho các sản phẩm thể thao cao cấp. Áp dụng cho tất cả khách hàng.</p>
                <div class="d-flex gap-3 align-items-center">
                    <div class="countdown-timer">
                        <div class="text-white-50 mb-2">Kết thúc sau:</div>
                        <div class="d-flex gap-2">
                            <div class="countdown-item bg-white text-danger rounded-3 p-2 text-center" style="min-width: 60px;">
                                <div class="fs-4 fw-bold">05</div>
                                <div class="small">Ngày</div>
                            </div>
                            <div class="countdown-item bg-white text-danger rounded-3 p-2 text-center" style="min-width: 60px;">
                                <div class="fs-4 fw-bold">12</div>
                                <div class="small">Giờ</div>
                            </div>
                            <div class="countdown-item bg-white text-danger rounded-3 p-2 text-center" style="min-width: 60px;">
                                <div class="fs-4 fw-bold">45</div>
                                <div class="small">Phút</div>
                            </div>
                            <div class="countdown-item bg-white text-danger rounded-3 p-2 text-center" style="min-width: 60px;">
                                <div class="fs-4 fw-bold">30</div>
                                <div class="small">Giây</div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-light btn-lg px-4" onclick="sharePromotion()">
                        <i class="fas fa-share-alt me-2"></i>Chia sẻ
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Promotion Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Promotion Image -->
                <div class="promo-image mb-4">
                    <img src="{{ asset('customer/images/promo.jpg') }}" alt="Siêu Sale Tháng 3" class="img-fluid rounded-4">
                </div>

                <!-- Promotion Info -->
                <div class="promo-info bg-white rounded-4 p-4 shadow-sm mb-4">
                    <h2 class="h4 fw-bold mb-3">Thông tin khuyến mãi</h2>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="text-muted mb-1">Thời gian bắt đầu:</div>
                                <div class="fw-bold">01/03/2024</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="text-muted mb-1">Thời gian kết thúc:</div>
                                <div class="fw-bold">05/03/2024</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="text-muted mb-1">Mức giảm giá:</div>
                                <div class="fw-bold text-danger">Giảm đến 50%</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="text-muted mb-1">Áp dụng cho:</div>
                                <div class="fw-bold">Tất cả khách hàng</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Promotion Description -->
                <div class="promo-description bg-white rounded-4 p-4 shadow-sm mb-4">
                    <h2 class="h4 fw-bold mb-3">Chi tiết chương trình</h2>
                    <div class="description-content">
                        <p>Chương trình "Siêu Sale Tháng 3" là sự kiện khuyến mãi đặc biệt dành cho các sản phẩm thể thao cao cấp tại SportShop. Với mức giảm giá lên đến 50%, đây là cơ hội tuyệt vời để bạn sở hữu những sản phẩm chất lượng với giá tốt nhất.</p>
                        
                        <h3 class="h5 fw-bold mt-4 mb-3">Đối tượng áp dụng:</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tất cả khách hàng</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Không giới hạn số lượng mua</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Áp dụng cho cả khách hàng mới và cũ</li>
                        </ul>

                        <h3 class="h5 fw-bold mt-4 mb-3">Điều kiện áp dụng:</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-info-circle text-primary me-2"></i>Áp dụng cho tất cả sản phẩm trong danh mục khuyến mãi</li>
                            <li class="mb-2"><i class="fas fa-info-circle text-primary me-2"></i>Không áp dụng đồng thời với các chương trình khuyến mãi khác</li>
                            <li class="mb-2"><i class="fas fa-info-circle text-primary me-2"></i>Không áp dụng cho các sản phẩm đã giảm giá</li>
                        </ul>

                        <h3 class="h5 fw-bold mt-4 mb-3">Cách thức áp dụng:</h3>
                        <ol class="ps-3">
                            <li class="mb-2">Chọn sản phẩm trong danh mục khuyến mãi</li>
                            <li class="mb-2">Thêm vào giỏ hàng</li>
                            <li class="mb-2">Mã giảm giá sẽ được tự động áp dụng</li>
                            <li class="mb-2">Hoàn tất đơn hàng</li>
                        </ol>
                    </div>
                </div>

                <!-- Related Products -->
                <div class="related-products bg-white rounded-4 p-4 shadow-sm">
                    <h2 class="h4 fw-bold mb-4">Sản phẩm khuyến mãi</h2>
                    <div class="row g-4">
                        @php
                        $promoProducts = [
                            [
                                'name' => 'Giày thể thao Nike Air Max',
                                'price' => '2,500,000',
                                'discount_price' => '1,250,000',
                                'image' => asset('customer/images/promo.jpg')
                            ],
                            [
                                'name' => 'Quần áo thể thao Adidas',
                                'price' => '1,800,000',
                                'discount_price' => '900,000',
                                'image' => asset('customer/images/promo.jpg')
                            ],
                            [
                                'name' => 'Balo thể thao Under Armour',
                                'price' => '1,200,000',
                                'discount_price' => '600,000',
                                'image' => asset('customer/images/promo.jpg')
                            ],
                            [
                                'name' => 'Phụ kiện thể thao Puma',
                                'price' => '800,000',
                                'discount_price' => '400,000',
                                'image' => asset('customer/images/promo.jpg')
                            ]
                        ];
                        @endphp

                        @foreach($promoProducts as $product)
                        <div class="col-md-6">
                            <div class="product-card bg-light rounded-4 p-3">
                                <div class="row g-3">
                                    <div class="col-4">
                                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid rounded-3">
                                    </div>
                                    <div class="col-8">
                                        <h3 class="h6 fw-bold mb-2">{{ $product['name'] }}</h3>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="text-danger fw-bold">{{ $product['discount_price'] }}đ</span>
                                            <span class="text-muted text-decoration-line-through small">{{ $product['price'] }}đ</span>
                                        </div>
                                        <button class="btn btn-danger btn-sm w-100 mt-2">
                                            <i class="fas fa-shopping-cart me-2"></i>Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Promotion Code -->
                <div class="promo-code bg-white rounded-4 p-4 shadow-sm mb-4">
                    <h3 class="h5 fw-bold mb-3">Mã khuyến mãi</h3>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="SUPERSALE50" readonly>
                        <button class="btn btn-danger" onclick="copyPromoCode()">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                    <div class="text-muted small">
                        <i class="fas fa-info-circle me-1"></i>
                        Mã giảm giá sẽ được tự động áp dụng khi thanh toán
                    </div>
                </div>

                <!-- Other Promotions -->
                <div class="other-promotions bg-white rounded-4 p-4 shadow-sm">
                    <h3 class="h5 fw-bold mb-3">Khuyến mãi khác</h3>
                    <div class="list-group list-group-flush">
                        @php
                        $otherPromotions = [
                            [
                                'title' => 'Flash Sale Cuối Tuần',
                                'discount' => 'Giảm đến 70%',
                                'time_left' => 'Còn 2 ngày'
                            ],
                            [
                                'title' => 'Ưu đãi Thành viên',
                                'discount' => 'Thêm 10%',
                                'time_left' => 'Còn 7 ngày'
                            ],
                            [
                                'title' => 'Combo Giày + Phụ Kiện',
                                'discount' => 'Tiết kiệm 30%',
                                'time_left' => 'Còn 3 ngày'
                            ]
                        ];
                        @endphp

                        @foreach($otherPromotions as $promo)
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="h6 fw-bold mb-1">{{ $promo['title'] }}</h4>
                                    <div class="text-danger small">{{ $promo['discount'] }}</div>
                                </div>
                                <div class="text-muted small">{{ $promo['time_left'] }}</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('customer/css/promotion-detail.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script>
function sharePromotion() {
    // Implement share functionality
    if (navigator.share) {
        navigator.share({
            title: 'Siêu Sale Tháng 3',
            text: 'Khuyến mãi đặc biệt giảm đến 50% cho các sản phẩm thể thao cao cấp!',
            url: window.location.href
        });
    } else {
        // Fallback for browsers that don't support Web Share API
        alert('Chia sẻ chương trình khuyến mãi này với bạn bè!');
    }
}

function copyPromoCode() {
    const promoCode = document.querySelector('.promo-code input');
    promoCode.select();
    document.execCommand('copy');
    alert('Đã sao chép mã khuyến mãi!');
}

// Countdown Timer
function updateCountdown() {
    // Implement countdown logic here
    // This is just a placeholder
    console.log('Updating countdown...');
}

// Update countdown every second
setInterval(updateCountdown, 1000);
</script>
@endpush 