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
            @forelse($activePromotions as $promotion)
            <div class="col-lg-6">
                <div class="promo-card bg-white rounded-4 overflow-hidden shadow-sm h-100">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="{{ asset('customer/images/promo.jpg') }}" class="w-100 h-100 object-fit-cover" alt="{{ $promotion->name }}">
                        </div>
                        <div class="col-md-7">
                            <div class="p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h3 class="h5 fw-bold mb-0">{{ $promotion->name }}</h3>
                                    <span class="badge bg-danger">
                                        {{ $promotion->discount_type === 'percent' ? $promotion->discount_value . '%' : number_format($promotion->discount_value) . 'đ' }}
                                    </span>
                                </div>
                                <p class="text-muted mb-3">{{ $promotion->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-danger fw-bold">
                                        <i class="fas fa-clock me-1"></i>
                                        Còn {{ \Carbon\Carbon::now()->diffInDays($promotion->end_date) }} ngày
                                    </div>
                                    <a href="{{ route('customer.products.index') }}" class="btn btn-outline-danger">
                                        Mua ngay <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-4">
                    <p class="text-muted mb-0">Hiện tại không có khuyến mãi nào đang diễn ra.</p>
                </div>
            </div>
            @endforelse
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
            @forelse($upcomingPromotions as $promotion)
            <div class="col-lg-4 col-md-6">
                <div class="promo-card bg-white rounded-4 overflow-hidden shadow-sm h-100">
                    <img src="{{ asset('customer/images/promo.jpg') }}" class="w-100" style="height: 200px; object-fit: cover;" alt="{{ $promotion->name }}">
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h3 class="h5 fw-bold mb-0">{{ $promotion->name }}</h3>
                            <span class="badge bg-primary">
                                {{ $promotion->discount_type === 'percent' ? $promotion->discount_value . '%' : number_format($promotion->discount_value) . 'đ' }}
                            </span>
                        </div>
                        <p class="text-muted mb-3">{{ $promotion->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-primary fw-bold">
                                <i class="fas fa-calendar me-1"></i>
                                Bắt đầu: {{ $promotion->start_date->format('d/m/Y') }}
                            </div>
                            <button class="btn btn-outline-primary btn-sm" onclick="setReminder('{{ $promotion->id }}')">
                                <i class="fas fa-bell me-1"></i>Nhắc nhở
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-4">
                    <p class="text-muted mb-0">Không có khuyến mãi sắp diễn ra.</p>
                </div>
            </div>
            @endforelse
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