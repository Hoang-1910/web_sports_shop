@extends('customer.layouts.app')

@section('title', 'Khuyến mãi')

@section('content')
<!-- Hero Banner -->
<section class="promo-hero position-relative py-5" style="background: linear-gradient(135deg, #e53935 0%, #c62828 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-white">
                <h1 class="display-4 fw-bold mb-3">Khuyến mãi hấp dẫn</h1>
                <p class="lead mb-4">Khám phá ngay các chương trình khuyến mãi đặc biệt dành riêng cho bạn!</p>
                <div class="d-flex gap-3">
                    <a href="#active-promos" class="btn btn-light btn-lg px-4">
                        <i class="fas fa-gift me-2"></i>Xem ngay
                    </a>
                    <a href="#upcoming-promos" class="btn btn-outline-light btn-lg px-4">
                        <i class="fas fa-calendar me-2"></i>Sắp diễn ra
                    </a>
                </div>
            </div>
        
        </div>
    </div>
</section>

<!-- Active Promotions -->
<section id="active-promos" class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">
            <i class="fas fa-fire text-danger me-2"></i>
            Khuyến mãi đang diễn ra
        </h2>
        
        <div class="row g-4">
            @php
            $activePromotions = [
                [
                    'id' => 1,
                    'title' => 'Siêu Sale Tháng 3',
                    'discount' => 'Giảm đến 50%',
                    'description' => 'Khuyến mãi đặc biệt dành cho các sản phẩm thể thao cao cấp. Áp dụng cho tất cả khách hàng.',
                    'time_left' => 'Còn 5 ngày',
                    'image' => asset('customer/images/promo.jpg'),
                    'link' => '#'
                ],
                [
                    'id' => 2,
                    'title' => 'Combo Giày + Phụ Kiện',
                    'discount' => 'Tiết kiệm 30%',
                    'description' => 'Mua combo giày thể thao và phụ kiện đi kèm. Áp dụng cho các sản phẩm được chọn.',
                    'time_left' => 'Còn 3 ngày',
                    'image' => asset('customer/images/promo.jpg'),
                    'link' => '#'
                ],
                [
                    'id' => 3,
                    'title' => 'Flash Sale Cuối Tuần',
                    'discount' => 'Giảm đến 70%',
                    'description' => 'Chương trình flash sale đặc biệt vào cuối tuần. Số lượng có hạn.',
                    'time_left' => 'Còn 2 ngày',
                    'image' => asset('customer/images/promo.jpg'),
                    'link' => '#'
                ],
                [
                    'id' => 4,
                    'title' => 'Ưu đãi Thành viên',
                    'discount' => 'Thêm 10%',
                    'description' => 'Thành viên mới nhận thêm ưu đãi 10% cho đơn hàng đầu tiên.',
                    'time_left' => 'Còn 7 ngày',
                    'image' => asset('customer/images/promo.jpg'),
                    'link' => '#'
                ]
            ];
            @endphp

            @foreach($activePromotions as $promo)
            <div class="col-lg-6">
                <div class="promo-card bg-white rounded-4 overflow-hidden shadow-sm h-100">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="{{ $promo['image'] }}" class="w-100 h-100 object-fit-cover" alt="{{ $promo['title'] }}">
                        </div>
                        <div class="col-md-7">
                            <div class="p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h3 class="h5 fw-bold mb-0">{{ $promo['title'] }}</h3>
                                    <span class="badge bg-danger">{{ $promo['discount'] }}</span>
                                </div>
                                <p class="text-muted mb-3">{{ $promo['description'] }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-danger fw-bold">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $promo['time_left'] }}
                                    </div>
                                    <a href="{{ $promo['link'] }}" class="btn btn-outline-danger">
                                        Chi tiết <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Upcoming Promotions -->
<section id="upcoming-promos" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">
            <i class="fas fa-calendar text-danger me-2"></i>
            Khuyến mãi sắp diễn ra
        </h2>
        
        <div class="row g-4">
            @php
            $upcomingPromotions = [
                [
                    'id' => 5,
                    'title' => 'Black Friday 2024',
                    'discount' => 'Giảm đến 80%',
                    'description' => 'Sự kiện Black Friday lớn nhất năm với hàng ngàn sản phẩm giảm giá.',
                    'start_date' => '24/11/2024',
                    'image' => asset('customer/images/promo.jpg')
                ],
                [
                    'id' => 6,
                    'title' => 'Tết Nguyên Đán 2025',
                    'discount' => 'Quà tặng đặc biệt',
                    'description' => 'Chương trình khuyến mãi đặc biệt nhân dịp Tết Nguyên Đán 2025.',
                    'start_date' => '01/02/2025',
                    'image' => asset('customer/images/promo.jpg')
                ],
                [
                    'id' => 7,
                    'title' => 'Hè Rực Rỡ 2025',
                    'discount' => 'Giảm đến 40%',
                    'description' => 'Chuỗi chương trình khuyến mãi hè với nhiều ưu đãi hấp dẫn.',
                    'start_date' => '01/06/2025',
                    'image' => asset('customer/images/promo.jpg')
                ]
            ];
            @endphp

            @foreach($upcomingPromotions as $promo)
            <div class="col-lg-4 col-md-6">
                <div class="promo-card bg-white rounded-4 overflow-hidden shadow-sm h-100">
                    <img src="{{ $promo['image'] }}" class="w-100" style="height: 200px; object-fit: cover;" alt="{{ $promo['title'] }}">
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h3 class="h5 fw-bold mb-0">{{ $promo['title'] }}</h3>
                            <span class="badge bg-primary">{{ $promo['discount'] }}</span>
                        </div>
                        <p class="text-muted mb-3">{{ $promo['description'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-primary fw-bold">
                                <i class="fas fa-calendar me-1"></i>
                                Bắt đầu: {{ $promo['start_date'] }}
                            </div>
                            <button class="btn btn-outline-primary btn-sm" onclick="setReminder('{{ $promo['id'] }}')">
                                <i class="fas fa-bell me-1"></i>Nhắc nhở
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Promotion Categories -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">
            <i class="fas fa-tags text-danger me-2"></i>
            Danh mục khuyến mãi
        </h2>
        
        <div class="row g-4">
            @php
            $promoCategories = [
                [
                    'name' => 'Giày thể thao',
                    'icon' => 'fas fa-shoe-prints',
                    'count' => 15,
                    'link' => '#'
                ],
                [
                    'name' => 'Quần áo thể thao',
                    'icon' => 'fas fa-tshirt',
                    'count' => 12,
                    'link' => '#'
                ],
                [
                    'name' => 'Phụ kiện',
                    'icon' => 'fas fa-dumbbell',
                    'count' => 8,
                    'link' => '#'
                ],
                [
                    'name' => 'Thiết bị tập luyện',
                    'icon' => 'fas fa-running',
                    'count' => 10,
                    'link' => '#'
                ]
            ];
            @endphp

            @foreach($promoCategories as $category)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{ $category['link'] }}" class="text-decoration-none">
                    <div class="category-card bg-white rounded-4 p-4 text-center shadow-sm h-100">
                        <div class="category-icon mb-3">
                            <i class="{{ $category['icon'] }} text-danger fs-1"></i>
                        </div>
                        <h3 class="h5 fw-bold text-dark mb-2">{{ $category['name'] }}</h3>
                        <p class="text-muted small mb-0">{{ $category['count'] }} khuyến mãi</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="fw-bold mb-3">Đăng ký nhận thông báo khuyến mãi</h2>
                <p class="text-muted mb-4">Nhận thông báo sớm nhất về các chương trình khuyến mãi đặc biệt!</p>
                <form class="newsletter-form">
                    <div class="input-group">
                        <input type="email" class="form-control form-control-lg" placeholder="Email của bạn" required>
                        <button class="btn btn-danger btn-lg px-4" type="submit">
                            <i class="fas fa-paper-plane me-2"></i>Đăng ký
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('customer/css/promotions.css') }}" rel="stylesheet">
@endpush