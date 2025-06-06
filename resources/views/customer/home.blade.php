@extends('customer.layouts.app')

@section('title', 'Trang chủ')

@section('content')
<!-- Hero Section -->
<section class="hero-bg-section position-relative w-100 overflow-hidden" role="banner">
    <!-- Background Image -->
    <div class="hero-background position-absolute top-0 start-0 w-100 h-100" 
         style="background: url('{{ asset('/customer/images/hero-bg.jpg') }}') center center/cover no-repeat;"
         aria-hidden="true"></div>
    
    <!-- Gradient Overlay -->
    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" 
         style="background: linear-gradient(135deg, rgba(229, 57, 53, 0.8) 0%, rgba(198, 40, 40, 0.6) 50%, rgba(0, 0, 0, 0.4) 100%);" 
         aria-hidden="true"></div>
    
    <!-- Floating Elements -->
    <div class="hero-floating-elements position-absolute top-0 start-0 w-100 h-100" aria-hidden="true">
        <div class="floating-shoe position-absolute" 
             style="top: 20%; right: 10%; animation: float 6s ease-in-out infinite;">
            <img src="{{ asset('/customer/images/category-shoes.jpg') }}" alt="" class="rounded-4 shadow-lg"    
                 style="width: 120px; height: 120px; object-fit: cover; opacity: 0.8;">
        </div>
        
        <div class="floating-accessory position-absolute" 
             style="top: 60%; left: 8%; animation: float 8s ease-in-out infinite reverse;">
            <img src="{{ asset('/customer/images/category-accessories.jpg') }}" alt="" class="rounded-circle shadow-lg" 
                 style="width: 80px; height: 80px; object-fit: cover; opacity: 0.7;">
        </div>
        
        <div class="floating-gym position-absolute" 
             style="bottom: 25%; right: 15%; animation: float 7s ease-in-out infinite;">
            <img src="{{ asset('/customer/images/category-gym.jpg') }}" alt="" class="rounded-4 shadow-lg" 
                 style="width: 100px; height: 100px; object-fit: cover; opacity: 0.6;">
        </div>
    </div>
    
    <!-- Particle Effects -->
    <div class="hero-particles position-absolute top-0 start-0 w-100 h-100" aria-hidden="true">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
    </div>
    
    <!-- Main Content -->
    <div class="hero-section d-flex flex-column align-items-center justify-content-center text-center position-relative" 
         style="z-index: 10; min-height: 100vh; padding: 2rem 0;">
        <div class="container">
            <!-- Hero Badge -->
            <div class="hero-badge mb-4 animate-fade-in">
                <span class="badge bg-light text-dark px-4 py-2 rounded-pill fs-6 fw-semibold">
                    <i class="fas fa-fire text-danger me-2"></i>
                    New Collection 2025
                </span>
            </div>
            
            <!-- Main Title -->
            <h1 class="hero-title mb-4 animate-fade-in-delay text-white display-2 fw-bold">
                Be Faster – Be Stronger
                <br>
                <span class="text-warning">Be You</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="hero-subtitle mb-5 animate-fade-in-delay-2 text-white fs-4 mx-auto" 
               style="max-width: 600px; line-height: 1.6;">
                Khám phá bộ sưu tập mới nhất với công nghệ tiên tiến cho hiệu suất tối đa. 
                Thiết kế dành cho những ai không ngừng vượt qua giới hạn bản thân.
            </p>
            
            <!-- CTA Buttons -->
            <div class="hero-buttons d-flex flex-column flex-sm-row justify-content-center gap-4 animate-fade-in-delay-3">
                <a href="#" class="btn btn-danger btn-lg px-5 py-3 fw-semibold hero-btn-primary" 
                   aria-label="Mua sản phẩm ngay">
                    <i class="fas fa-shopping-cart me-2" aria-hidden="true"></i>
                    Mua ngay
                    <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
                </a>
                <a href="#" class="btn btn-outline-light btn-lg px-5 py-3 fw-semibold hero-btn-secondary" 
                   aria-label="Xem tất cả bộ sưu tập">
                    <i class="fas fa-eye me-2" aria-hidden="true"></i>
                    Xem bộ sưu tập
                </a>
            </div>
            
            <!-- Hero Stats -->
            <div class="hero-stats mt-5 animate-fade-in-delay-4">
                <div class="row justify-content-center text-white">
                    <div class="col-4 col-md-2">
                        <div class="stat-item">
                            <div class="fs-2 fw-bold text-warning">500+</div>
                            <div class="small text-white-50">Sản phẩm</div>
                        </div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="stat-item">
                            <div class="fs-2 fw-bold text-warning">50K+</div>
                            <div class="small text-white-50">Khách hàng</div>
                        </div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="stat-item">
                            <div class="fs-2 fw-bold text-warning">99%</div>
                            <div class="small text-white-50">Hài lòng</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-4">
                <div class="scroll-mouse">
                    <div class="scroll-wheel"></div>
                </div>
                <div class="text-white small mt-2">Cuộn xuống</div>
            </div>
        </div>
    </div>
</section>


<!-- Danh mục nổi bật -->
{{-- <section class="featured-categories py-5" aria-labelledby="featured-categories-title">
    <div class="container">
        <h2 id="featured-categories-title" class="section-title text-center mb-4">Danh mục nổi bật</h2>
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <article class="category-card-custom position-relative h-100" style="min-height: 280px;">
                    <div class="category-gradient position-absolute top-0 start-0 w-100 h-100 rounded-4"></div>
                    <div class="category-content position-absolute bottom-0 start-0 p-4 text-white">
                        <h3 class="fw-bold mb-2 h4">{{ $category['title'] }}</h3>
                        <a href="{{ $category['link'] ?? '#' }}" class="btn btn-outline-light btn-sm">
                            Xem ngay <i class="fas fa-arrow-right ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}



<!-- Sản phẩm nổi bật -->
<section class="featured-products py-5 bg-light" aria-labelledby="featured-products-title">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 id="featured-products-title" class="section-title mb-0">Sản phẩm nổi bật</h2>
            <a href="#" class="text-danger text-decoration-none">
                Xem tất cả <i class="fas fa-arrow-right ms-1" aria-hidden="true"></i>
            </a>
        </div>
        <div class="row g-4" id="featured-products-list">
            @foreach($featuredProducts as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <article class="product-card-custom position-relative bg-white rounded-4 overflow-hidden shadow-sm h-100 product-hover-effect">
                    <!-- Product Badges -->
                    <div class="position-absolute top-0 start-0 m-2 z-3 d-flex flex-column gap-1">
                        @foreach($product['badges'] as $badge)
                        <span class="badge {{ $badge === 'SALE' ? 'bg-danger' : 'bg-primary' }} animate-pulse">
                            {{ $badge }}
                        </span>
                        @endforeach
                    </div>
                    
                    <!-- Wishlist Button -->
                    <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 z-3 wishlist-btn"
                            data-product-id="{{ $product['id'] }}"
                            aria-label="Thêm vào danh sách yêu thích">
                        <i class="far fa-heart" aria-hidden="true"></i>
                    </button>
                    
                    <!-- Product Image -->
                    <div class="product-img-box position-relative w-100" style="aspect-ratio: 1.1/1;">
                        <img src="{{ asset('storage/' . $product['image']) }}"
                             class="w-100 h-100 object-fit-cover"
                             alt="{{ $product['name'] }}"
                             loading="lazy">
                        <button class="btn btn-danger add-to-cart-btn position-absolute start-0 bottom-0 w-100 rounded-0 opacity-0 translate-y-100 transition-all"
                                data-product-id="{{ $product['id'] }}">
                            <i class="fas fa-shopping-cart me-2" aria-hidden="true"></i>Thêm vào giỏ
                        </button>
                    </div>
                    
                    <!-- Product Info -->
                    <div class="p-3">
                        <h3 class="fw-semibold mb-2 h6">
                            <a href="#" class="text-decoration-none text-dark">
                                {{ $product['name'] }}
                            </a>
                        </h3>
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-danger fw-bold h6 mb-0">
                                {{ number_format($product['price']) }}đ
                            </span>
                            @if(isset($product['original_price']) && $product['original_price'])
                            <span class="text-muted text-decoration-line-through small">
                                {{ number_format($product['original_price']) }}đ
                            </span>
                            @endif
                        </div>
                        @if(isset($product['original_price']) && $product['original_price'])
                        <div class="text-success small">
                            Tiết kiệm {{ number_format($product['original_price'] - $product['price']) }}đ
                        </div>
                        @endif
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        <div id="products-loading" class="text-center py-4 d-none">
            <div class="spinner-border text-danger" role="status">
                <span class="visually-hidden">Đang tải...</span>
            </div>
        </div>
    </div>
</section>

<!-- Banner Bộ sưu tập mới -->
<section class="collection-banner my-5" aria-labelledby="collection-banner-title">
    <div class="container">
        <div class="collection-banner-wrapper rounded-4 overflow-hidden shadow-lg position-relative" 
             style="background: linear-gradient(135deg, #e53935 0%, #c62828 100%); min-height: 400px;">
            
            <!-- Background overlay for better readability -->
            <div class="position-absolute top-0 start-0 w-100 h-100" 
                 style="background: rgba(0,0,0,0.3); z-index: 1;"></div>
            
            <div class="row h-100 align-items-center position-relative" style="z-index: 2; min-height: 400px;">
                <!-- Content Column -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="collection-banner-content p-4 p-lg-5">
                        <h2 id="collection-banner-title" class="fw-bold text-white mb-3 display-6">
                            BST Hè 2025 – Activewear Pro
                        </h2>
                        <p class="text-white mb-4 lead fs-5">
                            Bộ sưu tập mới nhất với công nghệ thoáng khí, chống tia UV và co giãn 4 chiều. 
                            Thiết kế cho vận động viên chuyên nghiệp và người yêu thể thao.
                        </p>
                        <div class="d-flex flex-column flex-sm-row gap-3">
                            <a href="#" class="btn btn-light btn-lg px-4 fw-semibold">
                                <i class="fas fa-search me-2" aria-hidden="true"></i>Khám phá ngay
                            </a>
                            <a href="#" class="btn btn-outline-light btn-lg px-4 fw-semibold">
                                <i class="fas fa-play me-2" aria-hidden="true"></i>Xem video
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Image Column -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="collection-banner-img p-3 p-lg-4 h-100 d-flex align-items-center justify-content-center">
                        <div class="image-container position-relative w-100" style="max-width: 500px;">
                            <img src="/customer/images/category-gym.jpg" 
                                 alt="Bộ sưu tập Activewear Pro - Thời trang thể thao cao cấp" 
                                 class="w-100 rounded-4 shadow-lg" 
                                 style="height: 300px; object-fit: cover;"
                                 loading="lazy">
                            
                            <!-- Decorative elements -->
                            <div class="position-absolute top-0 end-0 translate-middle">
                                <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-star text-white fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
            

<!-- Thương hiệu nổi tiếng -->
{{-- <section class="famous-brands py-5" aria-labelledby="brands-title">
    <div class="container">
        <h2 id="brands-title" class="section-title text-center mb-5">Thương hiệu nổi tiếng</h2>
        <div class="row g-4 justify-content-center align-items-center">
            @foreach($brands as $brand)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="brand-card bg-white rounded-4 d-flex align-items-center justify-content-center p-4 shadow-sm brand-hover-effect" 
                     style="height: 120px;">
                    <img src="{{ $brand['logo'] }}" 
                         alt="Logo {{ $brand['name'] }}" 
                         class="brand-logo"
                         style="max-height: 60px; max-width: 100%; object-fit: contain;"
                         loading="lazy">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}

<!-- Tin tức thể thao -->
{{-- <section class="sports-news py-5 bg-light" aria-labelledby="news-title">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 id="news-title" class="section-title mb-0">Tin tức thể thao</h2>
            <a href="" class="text-danger text-decoration-none">
                Xem tất cả <i class="fas fa-arrow-right ms-1" aria-hidden="true"></i>
            </a>
        </div>
        <div class="row g-4">
            @foreach($news as $article)
            <div class="col-12 col-md-4">
                <article class="news-card bg-white rounded-4 overflow-hidden h-100 shadow-sm news-hover-effect">
                    <div class="position-relative">
                        <img src="{{ $article['image'] }}" 
                             class="w-100" 
                             style="height:220px;object-fit:cover;" 
                             alt="{{ $article['title'] }}"
                             loading="lazy">
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-danger">Mới</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <time class="text-muted small mb-2 d-block" datetime="{{ date('Y-m-d', strtotime(str_replace('/', '-', $article['date']))) }}">
                            <i class="fas fa-calendar-alt me-2" aria-hidden="true"></i>{{ $article['date'] }}
                        </time>
                        <h3 class="fw-bold mb-2 h6">
                            <a href="" class="text-decoration-none text-dark">
                                {{ $article['title'] }}
                            </a>
                        </h3>
                        <p class="text-muted small mb-3">{{ $article['excerpt'] }}</p>
                        <a href="" class="text-danger text-decoration-none small fw-semibold">
                            Đọc tiếp <i class="fas fa-arrow-right ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}

<!-- Đăng ký nhận tin -->
<section class="newsletter-section py-5" style="background: linear-gradient(135deg, #e53935 0%, #c62828 100%);">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="fw-bold text-white mb-3">
                    <i class="fas fa-envelope me-2" aria-hidden="true"></i>Đăng ký nhận tin
                </h2>
                <p class="text-white mb-4 lead">
                    Nhận khuyến mãi và cập nhật mới nhất về sản phẩm, bộ sưu tập và tin tức thể thao!
                </p>
                <form id="newsletter-form" class="d-flex flex-column flex-sm-row justify-content-center gap-3" method="POST" action="">
                    @csrf
                    <div class="flex-grow-1" style="max-width: 300px;">
                        <input type="email" 
                               name="email"
                               class="form-control form-control-lg rounded-3" 
                               placeholder="Email của bạn" 
                               required
                               aria-label="Địa chỉ email của bạn">
                    </div>
                    <button type="submit" class="btn btn-dark btn-lg rounded-3 px-4" id="newsletter-submit">
                        <span class="submit-text">
                            <i class="fas fa-paper-plane me-2" aria-hidden="true"></i>Đăng ký
                        </span>
                        <span class="submit-loading d-none">
                            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                            Đang xử lý...
                        </span>
                    </button>
                </form>
                <div id="newsletter-message" class="mt-3 d-none"></div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('styles')
<link href="{{ asset('customer/css/homepage.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('customer/js/homepage.js') }}"></script>
@endpush
