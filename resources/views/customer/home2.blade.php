@extends('customer.layouts.app')

@section('title', 'Trang chủ - Thể thao chuyên nghiệp')

@section('meta')
<meta name="description" content="Khám phá bộ sưu tập thể thao chuyên nghiệp với công nghệ tiên tiến. Giày thể thao, quần áo tập gym và phụ kiện từ các thương hiệu hàng đầu.">
<meta name="keywords" content="thể thao, giày thể thao, quần áo gym, phụ kiện thể thao, Nike, Adidas, Puma">
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-bg-section position-relative w-100" role="banner">
    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" aria-hidden="true"></div>
    <div class="hero-section d-flex flex-column align-items-center justify-content-center text-center position-relative" style="z-index:2; min-height: 60vh;">
        <h1 class="hero-title mb-3 animate-fade-in">Be Faster – Be Stronger – Be You</h1>
        <p class="hero-subtitle mb-4 animate-fade-in-delay">Khám phá bộ sưu tập mới nhất với công nghệ tiên tiến cho hiệu suất tối đa</p>
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 animate-fade-in-delay-2">
            <a href="{{ route('products') }}" class="btn btn-danger btn-lg px-5" aria-label="Mua sản phẩm ngay">
                <i class="fas fa-shopping-cart me-2" aria-hidden="true"></i>Mua ngay
            </a>
            <a href="{{ route('collections') }}" class="btn btn-light btn-lg px-5 border" aria-label="Xem tất cả bộ sưu tập">
                <i class="fas fa-eye me-2" aria-hidden="true"></i>Xem bộ sưu tập
            </a>
        </div>
    </div>
</section>

<!-- Danh mục nổi bật -->
<section class="featured-categories py-5" aria-labelledby="featured-categories-title">
    <div class="container">
        <h2 id="featured-categories-title" class="section-title text-center mb-4">Danh mục nổi bật</h2>
        <div class="row g-4 justify-content-center">
            @php
            $categories = [
                [
                    'title' => 'Giày thể thao',
                    'image' => '/customer/images/category-shoes.jpg',
                    'link' => route('category', 'shoes'),
                    'alt' => 'Bộ sưu tập giày thể thao cao cấp'
                ],
                [
                    'title' => 'Quần áo tập gym',
                    'image' => '/customer/images/category-gym.jpg', 
                    'link' => route('category', 'gym-wear'),
                    'alt' => 'Quần áo tập gym chuyên nghiệp'
                ],
                [
                    'title' => 'Phụ kiện thể thao',
                    'image' => '/customer/images/category-accessories.jpg',
                    'link' => route('category', 'accessories'),
                    'alt' => 'Phụ kiện thể thao đa dạng'
                ]
            ];
            @endphp
            
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6 col-12">
                <article class="category-card-custom position-relative h-100" style="min-height: 280px;">
                    <div class="category-bg position-absolute top-0 start-0 w-100 h-100 rounded-4" 
                         style="background: url('{{ $category['image'] }}') center center/cover no-repeat;"
                         role="img" aria-label="{{ $category['alt'] }}"></div>
                    <div class="category-gradient position-absolute top-0 start-0 w-100 h-100 rounded-4"></div>
                    <div class="category-content position-absolute bottom-0 start-0 p-4 text-white">
                        <h3 class="fw-bold mb-2 h4">{{ $category['title'] }}</h3>
                        <a href="{{ $category['link'] }}" class="btn btn-outline-light btn-sm">
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
            <a href="{{ route('products') }}" class="text-danger text-decoration-none">
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
                            <a href="{{ route('product.detail', $product['id']) }}" class="text-decoration-none text-dark">
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
        <div class="collection-banner-flex d-flex align-items-center flex-wrap rounded-4 overflow-hidden shadow-lg position-relative">
            <div class="collection-banner-content flex-grow-1 p-5 col-lg-6">
                <h2 id="collection-banner-title" class="fw-bold text-white mb-3">BST Hè 2025 – Activewear Pro</h2>
                <p class="text-white mb-4 lead">
                    Bộ sưu tập mới nhất với công nghệ thoáng khí, chống tia UV và co giãn 4 chiều. 
                    Thiết kế cho vận động viên chuyên nghiệp và người yêu thể thao.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a href="{{ route('collections.summer-2025') }}" class="btn btn-danger btn-lg px-4">
                        <i class="fas fa-search me-2" aria-hidden="true"></i>Khám phá ngay
                    </a>
                    <a href="{{ route('collections.summer-2025') }}" class="btn btn-outline-light btn-lg px-4">
                        <i class="fas fa-play me-2" aria-hidden="true"></i>Xem video
                    </a>
                </div>
            </div>
            <div class="collection-banner-img flex-grow-1 d-flex align-items-center justify-content-center p-3 col-lg-6">
                <img src="/customer/images/banner-collection.jpg" 
                     alt="Bộ sưu tập Activewear Pro - Thời trang thể thao cao cấp" 
                     class="w-100 h-100 object-fit-cover rounded-4" 
                     style="max-height:400px; min-height:300px;"
                     loading="lazy">
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
            <a href="{{ route('news') }}" class="text-danger text-decoration-none">
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
                            <a href="{{ route('news.detail', $article['slug']) }}" class="text-decoration-none text-dark">
                                {{ $article['title'] }}
                            </a>
                        </h3>
                        <p class="text-muted small mb-3">{{ $article['excerpt'] }}</p>
                        <a href="{{ route('news.detail', $article['slug']) }}" class="text-danger text-decoration-none small fw-semibold">
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
                <form id="newsletter-form" class="d-flex flex-column flex-sm-row justify-content-center gap-3" method="POST" action="{{ route('newsletter.subscribe') }}">
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
    <link href="{{ asset('customer/css/hero.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/css/homepage.css') }}" rel="stylesheet">
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
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('customer/js/hero.js') }}"></script>
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