@extends('customer.layouts.app')

@section('title', 'Thương hiệu')

@section('content')
<!-- Hero Banner -->
<section class="brands-hero position-relative py-5" style="background: linear-gradient(135deg, #e53935 0%, #c62828 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-white">
                <h1 class="display-4 fw-bold mb-3">Thương hiệu nổi bật</h1>
                <p class="lead mb-4">Khám phá các thương hiệu thể thao hàng đầu thế giới tại SportShop!</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Brands -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">
            <i class="fas fa-award text-danger me-2"></i>
            Thương hiệu nổi bật
        </h2>
        
        <div class="row g-4">
            @php
            $featuredBrands = [
                [
                    'name' => 'Nike',
                    'logo' => asset('customer/images/brand-nike.png'),
                    'description' => 'Just Do It - Thương hiệu thể thao số 1 thế giới',
                    'products_count' => 150,
                    'link' => '#'
                ],
                [
                    'name' => 'Adidas',
                    'logo' => asset('customer/images/brand-adidas.png'),
                    'description' => 'Impossible Is Nothing - Đổi mới không ngừng',
                    'products_count' => 120,
                    'link' => '#'
                ],
                [
                    'name' => 'Puma',
                    'logo' => asset('customer/images/brand-puma.png'),
                    'description' => 'Forever Faster - Tốc độ và hiệu suất',
                    'products_count' => 90,
                    'link' => '#'
                ],
                [
                    'name' => 'Under Armour',
                    'logo' => asset('customer/images/brand-underarmour.png'),
                    'description' => 'The Only Way Is Through - Vượt qua giới hạn',
                    'products_count' => 80,
                    'link' => '#'
                ]
            ];
            @endphp

            @foreach($featuredBrands as $brand)
            <div class="col-lg-3 col-md-6">
                <a href="{{ $brand['link'] }}" class="text-decoration-none">
                    <div class="brand-card bg-white rounded-4 p-4 text-center shadow-sm h-100">
                        <div class="brand-logo mb-3">
                            <img src="{{ $brand['logo'] }}" alt="{{ $brand['name'] }}" class="img-fluid" style="max-height: 80px;">
                        </div>
                        <h3 class="h5 fw-bold text-dark mb-2">{{ $brand['name'] }}</h3>
                        <p class="text-muted small mb-2">{{ $brand['description'] }}</p>
                        <span class="badge bg-danger">{{ $brand['products_count'] }} sản phẩm</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- All Brands -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">
            <i class="fas fa-list text-danger me-2"></i>
            Tất cả thương hiệu
        </h2>
        
        <div class="row g-4">
            @php
            $allBrands = [
                ['name' => 'Nike', 'products' => 150],
                ['name' => 'Adidas', 'products' => 120],
                ['name' => 'Puma', 'products' => 90],
                ['name' => 'Under Armour', 'products' => 80],
                ['name' => 'New Balance', 'products' => 70],
                ['name' => 'Asics', 'products' => 65],
                ['name' => 'Reebok', 'products' => 60],
                ['name' => 'Mizuno', 'products' => 55],
                ['name' => 'Brooks', 'products' => 50],
                ['name' => 'Saucony', 'products' => 45],
                ['name' => 'Salomon', 'products' => 40],
                ['name' => 'Hoka', 'products' => 35]
            ];
            @endphp

            @foreach($allBrands as $brand)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="text-decoration-none">
                    <div class="brand-item bg-white rounded-3 p-3 d-flex align-items-center shadow-sm">
                        <div class="brand-icon me-3">
                            <i class="fas fa-tag text-danger"></i>
                        </div>
                        <div class="brand-info">
                            <h4 class="h6 fw-bold text-dark mb-0">{{ $brand['name'] }}</h4>
                            <small class="text-muted">{{ $brand['products'] }} sản phẩm</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('customer/css/brands.css') }}">
@endpush 