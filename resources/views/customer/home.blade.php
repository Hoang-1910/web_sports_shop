@extends('customer.layouts.app')

@section('title', 'Trang chủ')

@section('content')
<!-- Hero Section -->
<section class="hero-bg-section position-relative w-100 overflow-hidden" role="banner">
    <!-- Background Image -->
    <div class="hero-background position-absolute top-0 start-0 w-100 h-100" 
         style="background: url('/customer/images/hero-bg.jpg') center center/cover no-repeat;"
         aria-hidden="true"></div>
    
    <!-- Gradient Overlay -->
    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" 
         style="background: linear-gradient(135deg, rgba(229, 57, 53, 0.8) 0%, rgba(198, 40, 40, 0.6) 50%, rgba(0, 0, 0, 0.4) 100%);" 
         aria-hidden="true"></div>
    
    <!-- Floating Elements -->
    <div class="hero-floating-elements position-absolute top-0 start-0 w-100 h-100" aria-hidden="true">
        <div class="floating-shoe position-absolute" 
             style="top: 20%; right: 10%; animation: float 6s ease-in-out infinite;">
            <img src="/customer/images/product1.jpg" alt="" class="rounded-4 shadow-lg" 
                 style="width: 120px; height: 120px; object-fit: cover; opacity: 0.8;">
        </div>
        
        <div class="floating-accessory position-absolute" 
             style="top: 60%; left: 8%; animation: float 8s ease-in-out infinite reverse;">
            <img src="/customer/images/category-accessories.jpg" alt="" class="rounded-circle shadow-lg" 
                 style="width: 80px; height: 80px; object-fit: cover; opacity: 0.7;">
        </div>
        
        <div class="floating-gym position-absolute" 
             style="bottom: 25%; right: 15%; animation: float 7s ease-in-out infinite;">
            <img src="/customer/images/category-gym.jpg" alt="" class="rounded-4 shadow-lg" 
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
<section class="featured-categories py-5" aria-labelledby="featured-categories-title">
    <div class="container">
        <h2 id="featured-categories-title" class="section-title text-center mb-4">Danh mục nổi bật</h2>
        <div class="row g-4">
            @php
            $categories = [
                [
                    'title' => 'Giày thể thao',
                    'image' => '/customer/images/category-shoes.jpg',
                    //'link' => route('category', 'shoes'),
                    'alt' => 'Bộ sưu tập giày thể thao cao cấp'
                ],
                [
                    'title' => 'Quần áo tập gym',
                    'image' => '/customer/images/category-gym.jpg', 
                    //'link' => route('category', 'gym-wear'),
                    'alt' => 'Quần áo tập gym chuyên nghiệp'
                ],
                [
                    'title' => 'Phụ kiện thể thao',
                    'image' => '/customer/images/category-accessories.jpg',
                    //'link' => route('category', 'accessories'),
                    'alt' => 'Phụ kiện thể thao đa dạng'
                ]
            ];
            @endphp
            
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <article class="category-card-custom position-relative h-100" style="min-height: 280px;">
                    <div class="category-bg position-absolute top-0 start-0 w-100 h-100 rounded-4" 
                         style="background: url('{{ $category['image'] }}') center center/cover no-repeat;"
                         role="img" aria-label="{{ $category['alt'] }}"></div>
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
</section>


<!-- Sản phẩm nổi bật -->
<section class="featured-products py-5 bg-light" aria-labelledby="featured-products-title">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 id="featured-products-title" class="section-title mb-0">Sản phẩm nổi bật</h2>
            <a href="" class="text-danger text-decoration-none">
                Xem tất cả <i class="fas fa-arrow-right ms-1" aria-hidden="true"></i>
            </a>
        </div>
        
        <div class="row g-4" id="featured-products-list">
            @php
            $featuredProducts = [
                [
                    'id' => 1,
                    'name' => 'Nike Air Zoom Pegasus 38',
                    'image' => '/customer/images/product1.jpg',
                    'price' => 2450000,
                    'original_price' => 2900000,
                    'badges' => ['NEW', 'SALE'],
                    'background' => '#d8a14a'
                ],
                [
                    'id' => 2,
                    'name' => 'Adidas Ultraboost 21',
                    'image' => '/customer/images/product2.jpg',
                    'price' => 3200000,
                    'badges' => ['NEW'],
                    'background' => '#181818'
                ],
                [
                    'id' => 3,
                    'name' => 'Puma RS-X³ Puzzle',
                    'image' => '/customer/images/product3.jpg',
                    'price' => 1990000,
                    'original_price' => 2500000,
                    'badges' => ['SALE'],
                    'background' => '#c6e94a'
                ],
                [
                    'id' => 4,
                    'name' => 'Under Armour HOVR Phantom',
                    'image' => '/customer/images/product4.jpg',
                    'price' => 3100000,
                    'badges' => [],
                    'background' => '#222'
                ]
            ];
            @endphp
            
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
                    <div class="product-img-box position-relative w-100" style="aspect-ratio: 1.1/1; background: {{ $product['background'] }};">
                        <img src="{{ $product['image'] }}" 
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
                            <a href="" class="text-decoration-none text-dark">
                                {{ $product['name'] }}
                            </a>
                        </h3>
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-danger fw-bold h6 mb-0">
                                {{ number_format($product['price']) }}đ
                            </span>
                            @if(isset($product['original_price']))
                            <span class="text-muted text-decoration-line-through small">
                                {{ number_format($product['original_price']) }}đ
                            </span>
                            @endif
                        </div>
                        @if(isset($product['original_price']))
                        <div class="text-success small">
                            Tiết kiệm {{ number_format($product['original_price'] - $product['price']) }}đ
                        </div>
                        @endif
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        
        <!-- Loading State -->
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
<section class="famous-brands py-5" aria-labelledby="brands-title">
    <div class="container">
        <h2 id="brands-title" class="section-title text-center mb-5">Thương hiệu nổi tiếng</h2>
        <div class="row g-4 justify-content-center align-items-center">
            @php
            $brands = [
                ['name' => 'Nike', 'logo' => '/customer/images/brand-nike.png'],
                ['name' => 'Adidas', 'logo' => '/customer/images/brand-adidas.png'],
                ['name' => 'Puma', 'logo' => '/customer/images/brand-puma.png'],
                ['name' => 'Under Armour', 'logo' => '/customer/images/brand-underarmour.png'],
                ['name' => 'New Balance', 'logo' => '/customer/images/brand-newbalance.png']
            ];
            @endphp
            
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
</section>

<!-- Tin tức thể thao -->
<section class="sports-news py-5 bg-light" aria-labelledby="news-title">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 id="news-title" class="section-title mb-0">Tin tức thể thao</h2>
            <a href="" class="text-danger text-decoration-none">
                Xem tất cả <i class="fas fa-arrow-right ms-1" aria-hidden="true"></i>
            </a>
        </div>
        <div class="row g-4">
            @php
            $news = [
                [
                    'title' => '5 bài tập cardio hiệu quả tại nhà không cần dụng cụ',
                    'date' => '15/05/2025',
                    'image' => '/customer/images/category-shoes.jpg',
                    'excerpt' => 'Khám phá những bài tập cardio đơn giản nhưng hiệu quả để giữ dáng tại nhà.',
                    'slug' => '5-bai-tap-cardio-hieu-qua-tai-nha'
                ],
                [
                    'title' => 'Cách chọn giày chạy bộ phù hợp với dáng bàn chân',
                    'date' => '10/05/2025',
                    'image' => '/customer/images/category-gym.jpg',
                    'excerpt' => 'Hướng dẫn chi tiết cách lựa chọn giày chạy bộ phù hợp với từng loại bàn chân.',
                    'slug' => 'cach-chon-giay-chay-bo-phu-hop'
                ],
                [
                    'title' => 'Chế độ dinh dưỡng cho người tập gym tăng cơ giảm mỡ',
                    'date' => '05/05/2025',
                    'image' => '/customer/images/category-accessories.jpg',
                    'excerpt' => 'Menu dinh dưỡng khoa học giúp tối ưu hóa quá trình tập luyện và phục hồi.',
                    'slug' => 'che-do-dinh-duong-tap-gym'
                ]
            ];
            @endphp
            
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
</section>

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
    <!-- <link href="{{ asset('customer/css/hero.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('customer/css/homepage.css') }}" rel="stylesheet"> -->
    <style>
        /* Additional styles for improved UX */
        .animate-fade-in {
            animation: fadeIn 1s ease-in;
        }
        .animate-fade-in-delay {
            animation: fadeIn 1s ease-in 0.3s both;
        }
        .animate-fade-in-delay-2 {
            animation: fadeIn 1s ease-in 0.6s both;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .product-hover-effect:hover .add-to-cart-btn {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
        
        .brand-hover-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .brand-hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .news-hover-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .news-hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .transition-all {
            transition: all 0.3s ease;
        }
        
        .animate-pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        /* Featured Categories - Ensure equal height and proper alignment */
        .featured-categories .row {
            display: flex;
            flex-wrap: wrap;
        }
        
        .featured-categories .row > div {
            display: flex;
        }
        
        .category-card-custom {
            width: 100%;
            min-height: 300px;
        }
        
        /* Responsive breakpoints for categories */
        @media (min-width: 992px) {
            .featured-categories .col-lg-4 {
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
        }
        
        @media (min-width: 768px) and (max-width: 991.98px) {
            .featured-categories .col-md-4 {
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
        }
        
        @media (max-width: 767.98px) {
            .category-card-custom {
                min-height: 250px;
            }
        }

        /* CSS cho banner bộ sưu tập */
        .collection-banner-wrapper {
            transition: transform 0.3s ease;
        }

        .collection-banner-wrapper:hover {
            transform: translateY(-2px);
        }

        .collection-banner .btn {
            transition: all 0.3s ease;
            border-width: 2px;
        }

        .collection-banner .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .collection-banner .btn-light:hover {
            background: #f8f9fa;
            border-color: #f8f9fa;
        }

        .collection-banner .btn-outline-light:hover {
            background: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.8);
        }

        .collection-banner .image-container::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(45deg, rgba(255,255,255,0.2), rgba(255,255,255,0.1));
            border-radius: 1.5rem;
            z-index: -1;
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .collection-banner-content {
                text-align: center;
                padding: 2rem 1rem;
            }
            
            .collection-banner .display-6 {
                font-size: 1.75rem;
            }
            
            .collection-banner .lead {
                font-size: 1rem;
            }
        }

        @media (max-width: 767.98px) {
            .collection-banner-wrapper {
                min-height: 500px;
            }
            
            .collection-banner .row {
                min-height: 500px;
            }
            
            .collection-banner-img {
                order: -1;
            }
            
            .collection-banner-img img {
                height: 200px;
            }
        }

        /* Animation for the star icon */
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .collection-banner .fa-star {
            animation: rotate 3s linear infinite;
        }
        /* Newsletter section styles */

        .hero-bg-section {
            position: relative;
            min-height: 100vh;
        }

        .hero-background {
            filter: brightness(0.7) contrast(1.1);
        }

        /* Animations */
        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        @keyframes particle-float {
            0% { transform: translateY(0px); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateY(-100px); opacity: 0; }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }

        .animate-fade-in-delay {
            animation: fadeIn 1s ease-out 0.3s both;
        }

        .animate-fade-in-delay-2 {
            animation: fadeIn 1s ease-out 0.6s both;
        }

        .animate-fade-in-delay-3 {
            animation: fadeIn 1s ease-out 0.9s both;
        }

        .animate-fade-in-delay-4 {
            animation: fadeIn 1s ease-out 1.2s both;
        }

        /* Floating Elements */
        .floating-shoe, .floating-accessory, .floating-gym {
            z-index: 5;
        }

        /* Particle Effects */
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        .particle-1 {
            width: 4px;
            height: 4px;
            top: 20%;
            left: 20%;
            animation: particle-float 8s infinite linear;
        }

        .particle-2 {
            width: 6px;
            height: 6px;
            top: 40%;
            left: 80%;
            animation: particle-float 12s infinite linear 2s;
        }

        .particle-3 {
            width: 3px;
            height: 3px;
            top: 60%;
            left: 30%;
            animation: particle-float 10s infinite linear 4s;
        }

        .particle-4 {
            width: 5px;
            height: 5px;
            top: 30%;
            left: 70%;
            animation: particle-float 15s infinite linear 1s;
        }

        .particle-5 {
            width: 4px;
            height: 4px;
            top: 70%;
            left: 60%;
            animation: particle-float 9s infinite linear 3s;
        }

        /* Hero Buttons */
        .hero-btn-primary {
            background: linear-gradient(45deg, #e53935, #c62828);
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(229, 57, 53, 0.3);
        }

        .hero-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(229, 57, 53, 0.4);
            background: linear-gradient(45deg, #c62828, #b71c1c);
        }

        .hero-btn-secondary {
            border: 2px solid rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .hero-btn-secondary:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 1);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.2);
        }

        /* Hero Badge */
        .hero-badge .badge {
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        /* Scroll Indicator */
        .scroll-indicator {
            animation: bounce 2s infinite;
            z-index: 10;
        }

        .scroll-mouse {
            width: 20px;
            height: 35px;
            border: 2px solid rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            position: relative;
            margin: 0 auto;
        }

        .scroll-wheel {
            width: 2px;
            height: 8px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 2px;
            position: absolute;
            top: 6px;
            left: 50%;
            transform: translateX(-50%);
            animation: scroll-wheel 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        @keyframes scroll-wheel {
            0% { opacity: 1; transform: translateX(-50%) translateY(0); }
            100% { opacity: 0; transform: translateX(-50%) translateY(15px); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                min-height: 100vh;
                padding: 1rem 0;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .floating-shoe, .floating-accessory, .floating-gym {
                display: none;
            }
            
            .hero-buttons .btn {
                width: 100%;
                max-width: 300px;
            }
            
            .hero-stats .stat-item {
                margin-bottom: 1rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-buttons {
                gap: 1rem;
            }
        }

        /* Performance Optimization */
        .hero-background {
            will-change: transform;
        }

        .floating-shoe, .floating-accessory, .floating-gym {
            will-change: transform;
        }
        </style>
@endpush

@push('scripts')
    <script>
        // Enhanced JavaScript functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Wishlist functionality
            document.querySelectorAll('.wishlist-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const icon = this.querySelector('i');
                    const productId = this.dataset.productId;
                    
                    // Toggle icon
                    if (icon.classList.contains('far')) {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        this.classList.add('text-danger');
                    } else {
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        this.classList.remove('text-danger');
                    }
                    
                    // Send to backend (implement your wishlist logic)
                    // fetch('/wishlist/toggle', { ... })
                });
            });
            
            // Add to cart functionality
            document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productId = this.dataset.productId;
                    const originalText = this.innerHTML;
                    
                    // Show loading state
                    this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Đang thêm...';
                    this.disabled = true;
                    
                    // Simulate API call (replace with actual implementation)
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-check me-2"></i>Đã thêm';
                        this.classList.remove('btn-danger');
                        this.classList.add('btn-success');
                        
                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.classList.remove('btn-success');
                            this.classList.add('btn-danger');
                            this.disabled = false;
                        }, 2000);
                    }, 1000);
                });
            });
            
            // Newsletter form submission
            const newsletterForm = document.getElementById('newsletter-form');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const submitBtn = document.getElementById('newsletter-submit');
                    const submitText = submitBtn.querySelector('.submit-text');
                    const submitLoading = submitBtn.querySelector('.submit-loading');
                    const messageDiv = document.getElementById('newsletter-message');
                    
                    // Show loading state
                    submitText.classList.add('d-none');
                    submitLoading.classList.remove('d-none');
                    submitBtn.disabled = true;
                    
                    // Simulate form submission (replace with actual implementation)
                    setTimeout(() => {
                        submitText.classList.remove('d-none');
                        submitLoading.classList.add('d-none');
                        submitBtn.disabled = false;
                        
                        messageDiv.classList.remove('d-none');
                        messageDiv.className = 'mt-3 alert alert-success';
                        messageDiv.textContent = 'Đăng ký thành công! Cảm ơn bạn đã quan tâm.';
                        
                        // Reset form
                        this.reset();
                        
                        // Hide message after 5 seconds
                        setTimeout(() => {
                            messageDiv.classList.add('d-none');
                        }, 5000);
                    }, 2000);
                });
            }
            
            // Lazy loading for images (if needed)
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            if (img.dataset.src) {
                                img.src = img.dataset.src;
                                img.removeAttribute('data-src');
                                observer.unobserve(img);
                            }
                        }
                    });
                });
                
                document.querySelectorAll('img[data-src]').forEach(img => {
                    imageObserver.observe(img);
                });
            }
        });
    </script>
@endpush
