@extends('customer.layouts.app')

@section('title', 'Trang chủ')

@section('content')
<!-- Hero Section -->
<div class="hero-bg-section position-relative w-100">
    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="hero-section d-flex flex-column align-items-center justify-content-center text-center position-relative" style="z-index:2; min-height: 500px;">
        <h1 class="hero-title mb-3">Be Faster – Be Stronger – Be You</h1>
        <p class="hero-subtitle mb-4">Khám phá bộ sưu tập mới nhất với công nghệ tiên tiến cho hiệu suất tối đa</p>
        <div class="d-flex flex-row justify-content-center gap-3">
            <a href="#" class="btn btn-danger btn-lg px-5">Mua ngay</a>
            <a href="#" class="btn btn-light btn-lg px-5 border">Xem bộ sưu tập</a>
        </div>
    </div>
</div>



<!-- Danh mục nổi bật -->
<section class="featured-categories py-5">
    <div class="container">
        <h2 class="section-title text-center mb-4">Danh mục nổi bật</h2>
        <div class="d-flex flex-row gap-4 justify-content-center flex-wrap">
            <div class="category-card-custom position-relative flex-grow-1" style="max-width: 32%; min-width: 320px; min-height: 260px;">
                <div class="category-bg" style="background: url('/customer/images/category-shoes.jpg') center center/cover no-repeat;"></div>
                <div class="category-gradient position-absolute top-0 start-0 w-100 h-100 rounded-4"></div>
                <div class="category-content position-absolute bottom-0 start-0 p-4 text-white">
                    <h3 class="fw-bold mb-1">Giày thể thao</h3>
                    <a href="#" class="text-white text-decoration-underline small">Xem ngay</a>
                </div>
            </div>
            <div class="category-card-custom position-relative flex-grow-1" style="max-width: 32%; min-width: 320px; min-height: 260px;">
                <div class="category-bg" style="background: url('/customer/images/category-gym.jpg') center center/cover no-repeat;"></div>
                <div class="category-gradient position-absolute top-0 start-0 w-100 h-100 rounded-4"></div>
                <div class="category-content position-absolute bottom-0 start-0 p-4 text-white">
                    <h3 class="fw-bold mb-1">Quần áo tập gym</h3>
                    <a href="#" class="text-white text-decoration-underline small">Xem ngay</a>
                </div>
            </div>
            <div class="category-card-custom position-relative flex-grow-1" style="max-width: 32%; min-width: 320px; min-height: 260px;">
                <div class="category-bg" style="background: url('/customer/images/category-accessories.jpg') center center/cover no-repeat;"></div>
                <div class="category-gradient position-absolute top-0 start-0 w-100 h-100 rounded-4"></div>
                <div class="category-content position-absolute bottom-0 start-0 p-4 text-white">
                    <h3 class="fw-bold mb-1">Phụ kiện thể thao</h3>
                    <a href="#" class="text-white text-decoration-underline small">Xem ngay</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sản phẩm nổi bật -->
<section class="featured-products py-5 bg-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Sản phẩm nổi bật</h2>
            <a href="#" class="text-danger small">Xem tất cả</a>
        </div>
        <div class="product-list d-flex flex-wrap">
            <div class="product-card-custom position-relative bg-light rounded-4 overflow-hidden">
                <div class="position-absolute top-0 start-0 m-2 z-2"><span class="badge bg-primary">NEW</span></div>
                <div class="position-absolute top-0 end-0 m-2 z-2"><span class="badge bg-danger">SALE</span></div>
                <div class="product-img-box position-relative w-100" style="aspect-ratio: 1.1/1; background: #d8a14a;">
                    <img src="/customer/images/product1.jpg" class="w-100 h-100 object-fit-cover" alt="Nike Air Zoom Pegasus 38">
                    <button class="btn btn-light add-to-cart-btn position-absolute start-0 bottom-0 w-100 rounded-3">Thêm vào giỏ</button>
                </div>
                <div class="p-3">
                    <div class="fw-semibold mb-1">Nike Air Zoom Pegasus 38</div>
                    <div>
                        <span class="text-danger fw-bold">2.450.000đ</span>
                        <span class="text-muted text-decoration-line-through small">2.900.000đ</span>
                    </div>
                </div>
            </div>
            <div class="product-card-custom position-relative bg-light rounded-4 overflow-hidden">
                <div class="position-absolute top-0 start-0 m-2 z-2"><span class="badge bg-primary">NEW</span></div>
                <div class="product-img-box position-relative w-100" style="aspect-ratio: 1.1/1; background: #181818;">
                    <img src="/customer/images/product2.jpg" class="w-100 h-100 object-fit-cover" alt="Adidas Ultraboost 21">
                    <button class="btn btn-light add-to-cart-btn position-absolute start-0 bottom-0 w-100 rounded-3">Thêm vào giỏ</button>
                </div>
                <div class="p-3">
                    <div class="fw-semibold mb-1">Adidas Ultraboost 21</div>
                    <div>
                        <span class="text-dark fw-bold">3.200.000đ</span>
                    </div>
                </div>
            </div>
            <div class="product-card-custom position-relative bg-light rounded-4 overflow-hidden">
                <div class="position-absolute top-0 end-0 m-2 z-2"><span class="badge bg-danger">SALE</span></div>
                <div class="product-img-box position-relative w-100" style="aspect-ratio: 1.1/1; background: #c6e94a;">
                    <img src="/customer/images/product3.jpg" class="w-100 h-100 object-fit-cover" alt="Puma RS-X³ Puzzle">
                    <button class="btn btn-light add-to-cart-btn position-absolute start-0 bottom-0 w-100 rounded-3">Thêm vào giỏ</button>
                </div>
                <div class="p-3">
                    <div class="fw-semibold mb-1">Puma RS-X³ Puzzle</div>
                    <div>
                        <span class="text-danger fw-bold">1.990.000đ</span>
                        <span class="text-muted text-decoration-line-through small">2.500.000đ</span>
                    </div>
                </div>
            </div>
            <div class="product-card-custom position-relative bg-light rounded-4 overflow-hidden">
                <div class="product-img-box position-relative w-100" style="aspect-ratio: 1.1/1; background: #222;">
                    <img src="/customer/images/product4.jpg" class="w-100 h-100 object-fit-cover" alt="Under Armour HOVR Phantom">
                    <button class="btn btn-light add-to-cart-btn position-absolute start-0 bottom-0 w-100 rounded-3">Thêm vào giỏ</button>
                </div>
                <div class="p-3">
                    <div class="fw-semibold mb-1">Under Armour HOVR Phantom</div>
                    <div>
                        <span class="text-dark fw-bold">3.100.000đ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner Bộ sưu tập mới -->
<section class="collection-banner my-5">
    <div class="container">
        <div class="collection-banner-flex d-flex align-items-center flex-wrap rounded-4 overflow-hidden">
            <div class="collection-banner-content flex-grow-1 p-5">
                <h2 class="fw-bold text-white mb-3">BST Hè 2025 – Activewear Pro</h2>
                <p class="text-white-50 mb-4">
                    Bộ sưu tập mới nhất với công nghệ thoáng khí, chống tia UV và co giãn 4 chiều. Thiết kế cho vận động viên chuyên nghiệp và người yêu thể thao.
                </p>
                <a href="#" class="btn btn-danger btn-lg px-4">Khám phá ngay</a>
            </div>
            <div class="collection-banner-img flex-grow-1 d-flex align-items-center justify-content-center p-3">
                <img src="/customer/images/category-gym.jpg" alt="Activewear Pro" class="w-100 h-100 object-fit-cover rounded-4" style="max-height:400px; min-width:220px;">
            </div>
        </div>
    </div>
</section>

<!-- Thương hiệu nổi tiếng -->
<section class="famous-brands py-5">
    <div class="container">
        <h2 class="section-title text-center mb-4">Thương hiệu nổi tiếng</h2>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <div class="brand-card bg-light rounded-4 d-flex align-items-center justify-content-center">
                <img src="/customer/images/brand-nike.png" alt="Nike" height="60">
            </div>
            <div class="brand-card bg-light rounded-4 d-flex align-items-center justify-content-center">
                <img src="/customer/images/brand-adidas.png" alt="Adidas" height="60">
            </div>
            <div class="brand-card bg-light rounded-4 d-flex align-items-center justify-content-center">
                <img src="/customer/images/brand-puma.png" alt="Puma" height="60">
            </div>
            <div class="brand-card bg-light rounded-4 d-flex align-items-center justify-content-center">
                <img src="/customer/images/brand-underarmour.png" alt="Under Armour" height="60">
            </div>
            <div class="brand-card bg-light rounded-4 d-flex align-items-center justify-content-center">
                <img src="/customer/images/brand-newbalance.png" alt="New Balance" height="60">
            </div>
        </div>
    </div>
</section>


<!-- Tin tức thể thao -->
<section class="sports-news py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Tin tức thể thao</h2>
            <a href="#" class="text-danger small">Xem tất cả</a>
        </div>
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="news-card bg-white rounded-4 overflow-hidden h-100">
                    <img src="/customer/images/category-shoes.jpg" class="w-100" style="height:220px;object-fit:cover;" alt="">
                    <div class="p-4">
                        <div class="text-muted small mb-2">15/05/2025</div>
                        <div class="fw-bold mb-2">5 bài tập cardio hiệu quả tại nhà không cần dụng cụ</div>
                        <a href="#" class="text-danger small">Đọc tiếp</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="news-card bg-white rounded-4 overflow-hidden h-100">
                    <img src="/customer/images/category-gym.jpg" class="w-100" style="height:220px;object-fit:cover;" alt="">
                    <div class="p-4">
                        <div class="text-muted small mb-2">10/05/2025</div>
                        <div class="fw-bold mb-2">Cách chọn giày chạy bộ phù hợp với dáng bàn chân</div>
                        <a href="#" class="text-danger small">Đọc tiếp</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="news-card bg-white rounded-4 overflow-hidden h-100">
                    <img src="/customer/images/category-accessories.jpg" class="w-100" style="height:220px;object-fit:cover;" alt="">
                    <div class="p-4">
                        <div class="text-muted small mb-2">05/05/2025</div>
                        <div class="fw-bold mb-2">Chế độ dinh dưỡng cho người tập gym tăng cơ giảm mỡ</div>
                        <a href="#" class="text-danger small">Đọc tiếp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Đăng ký nhận tin -->
<section class="newsletter-section py-5" style="background: #e53935;">
    <div class="container text-center">
        <h2 class="fw-bold text-white mb-3">Đăng ký nhận tin</h2>
        <p class="text-white-50 mb-4">Nhận khuyến mãi và cập nhật mới nhất về sản phẩm, bộ sưu tập và tin tức thể thao!</p>
        <form class="d-flex justify-content-center gap-2 flex-wrap" style="max-width: 500px; margin: 0 auto;">
            <input type="email" class="form-control form-control-lg rounded-3" placeholder="Email của bạn" required>
            <button type="submit" class="btn btn-dark btn-lg rounded-3 px-4">Đăng ký</button>
        </form>
    </div>
</section>

@endsection

@push('styles')
    <link href="{{ asset('customer/css/hero.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/css/homepage.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('customer/js/hero.js') }}"></script>
@endpush
