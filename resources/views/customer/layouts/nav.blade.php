<!-- Navigation Bar -->
@prepend('styles')
    <link href="{{ asset('customer/css/navbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
@endprepend

<header class="navbar-header bg-white shadow-sm sticky-top">
    <div class="container-fluid px-3 px-lg-5">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center me-4" href="#">
                <div class="logo-container d-flex align-items-center justify-content-center">
                    <img src="{{ asset('customer/images/logo.jpg') }}" alt="SportShop Logo" class="logo-img" loading="lazy"
                         onerror="this.classList.add('d-none'); this.nextElementSibling.classList.remove('d-none')">
                    <div class="logo-placeholder d-none align-items-center justify-content-center bg-danger rounded-circle">
                        <i class="bi bi-shop text-white fs-3"></i>
                    </div>
                </div>
                <span class="brand-text ms-2 fw-bold text-dark d-none d-md-inline">SportShop</span>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="navbar-toggler border-0 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu"
                    aria-controls="mobileMenu" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar content -->
            <div class="collapse navbar-collapse d-none d-lg-flex align-items-center" id="navbarContent" style="min-width: 0;">
                <!-- Main Navigation -->
                <ul class="navbar-nav flex-grow-1 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-medium" href="#" id="productsDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="productsDropdown">
                            <li><a class="dropdown-item" href="#">Tất cả sản phẩm</a></li>
                            <li><hr class="dropdown-divider"></li>
                            @foreach($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="#">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-medium" href="#" id="brandsDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Thương hiệu
                        </a>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="brandsDropdown">
                            <li><a class="dropdown-item" href="#">Tất cả thương hiệu</a></li>
                            <li><hr class="dropdown-divider"></li>
                            @foreach([
                                ['name' => 'Nike', 'slug' => 'nike'],
                                ['name' => 'Adidas', 'slug' => 'adidas'],
                                ['name' => 'Puma', 'slug' => 'puma']
                            ] as $brand)
                                <li><a class="dropdown-item" href="#">{{ $brand['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Liên hệ</a>
                    </li>
                </ul>

                <!-- Search form + Action icons (right) -->
                <div class="d-none d-lg-flex align-items-center gap-3 ms-auto">
                    <form class="search-form position-relative" style="min-width:180px;max-width:260px;" role="search" action="#" method="GET">
                        <input class="form-control search-input rounded-pill" type="search" name="q" placeholder="Tìm kiếm sản phẩm..."
                               value="{{ request('q') }}" aria-label="Search products">
                        <button class="search-btn position-absolute end-0 top-50 translate-middle-y me-2 border-0 bg-transparent" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                    <a href="#" class="nav-icon-link position-relative" title="Yêu thích" aria-label="Wishlist">
                        <i class="bi bi-heart fs-4"></i>
                        <span class="nav-badge badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">3</span>
                    </a>
                    <a href="#" class="nav-icon-link position-relative" title="Giỏ hàng" aria-label="Cart">
                        <i class="bi bi-cart fs-4"></i>
                        <span class="nav-badge badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">2</span>
                    </a>
                    <!-- Avatar/user -->
                    <div class="dropdown">
                        <a class="nav-icon-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="userDropdown" data-bs-toggle="dropdown">
                            <img src="{{ asset('customer/images/avatar.jpg') }}" alt="Avatar" class="rounded-circle" width="32" height="32">
                        </a>
                        <!-- Dropdown menu here -->
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Mobile Offcanvas Menu -->
<div class="offcanvas offcanvas-start mobile-menu" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header border-bottom bg-danger text-white">
        <h5 class="offcanvas-title fw-bold" id="mobileMenuLabel">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <!-- Mobile User Section -->
        <div class="mobile-user-section p-3 bg-light border-bottom">
            @auth
                <div class="d-flex align-items-center">
                    <div class="user-avatar me-3">
                        <i class="bi bi-person-circle fs-2 text-danger"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 text-truncate" style="max-width: 200px;">Khách Demo</h6>
                        <small class="text-muted text-truncate" style="max-width: 200px;">demo@example.com</small>
                    </div>
                </div>
            @else
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-danger">Đăng nhập</a>
                    <a href="#" class="btn btn-outline-danger">Đăng ký</a>
                </div>
            @endauth
        </div>

        <!-- Mobile Navigation Links -->
        <nav class="mobile-nav">
            <a href="#" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-house me-3"></i>Trang chủ
            </a>
            
            <div class="mobile-nav-section">
                <div class="mobile-nav-header" data-bs-toggle="collapse" data-bs-target="#mobileProducts" aria-expanded="false" aria-controls="mobileProducts">
                    <i class="bi bi-grid me-3"></i>Sản phẩm
                    <i class="bi bi-chevron-down ms-auto"></i>
                </div>
                <div class="collapse" id="mobileProducts">
                    <a href="#" class="mobile-nav-sublink">Tất cả sản phẩm</a>
                    @foreach([
                        ['name' => 'Giày thể thao', 'slug' => 'giay-the-thao'],
                        ['name' => 'Quần áo thể thao', 'slug' => 'quan-ao-the-thao'],
                        ['name' => 'Phụ kiện', 'slug' => 'phu-kien']
                    ] as $category)
                        <a href="#" class="mobile-nav-sublink">{{ $category['name'] }}</a>
                    @endforeach
                </div>
            </div>

            <div class="mobile-nav-section">
                <div class="mobile-nav-header" data-bs-toggle="collapse" data-bs-target="#mobileBrands" aria-expanded="false" aria-controls="mobileBrands">
                    <i class="bi bi-award me-3"></i>Thương hiệu
                    <i class="bi bi-chevron-down ms-auto"></i>
                </div>
                <div class="collapse" id="mobileBrands">
                    <a href="#" class="mobile-nav-sublink">Tất cả thương hiệu</a>
                    @foreach([
                        ['name' => 'Nike', 'slug' => 'nike'],
                        ['name' => 'Adidas', 'slug' => 'adidas'],
                        ['name' => 'Puma', 'slug' => 'puma']
                    ] as $brand)
                        <a href="#" class="mobile-nav-sublink">{{ $brand['name'] }}</a>
                    @endforeach
                </div>
            </div>

            <a href="#" class="mobile-nav-link {{ request()->routeIs('promotions') ? 'active' : '' }}">
                <i class="bi bi-percent me-3"></i>Khuyến mãi
            </a>
            <a href="#" class="mobile-nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">
                <i class="bi bi-journal-text me-3"></i>Blog
            </a>
            <a href="#" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                <i class="bi bi-envelope me-3"></i>Liên hệ
            </a>
        </nav>

        <!-- Mobile Action Buttons -->
        <div class="mobile-actions p-3 border-top mt-auto">
            <div class="row g-2">
                <div class="col-4">
                    <a href="#" class="btn btn-outline-danger w-100 d-flex flex-column align-items-center position-relative">
                        <i class="bi bi-heart fs-5"></i>
                        <small>Yêu thích</small>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">3</span>
                    </a>
                </div>
                <div class="col-4">
                    <a href="#" class="btn btn-outline-danger w-100 d-flex flex-column align-items-center position-relative">
                        <i class="bi bi-cart fs-5"></i>
                        <small>Giỏ hàng</small>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">2</span>
                    </a>
                </div>
                <div class="col-4">
                    @auth
                        <a href="#" class="btn btn-outline-danger w-100 d-flex flex-column align-items-center">
                            <i class="bi bi-bag fs-5"></i>
                            <small>Đơn hàng</small>
                        </a>
                    @else
                        <a href="#" class="btn btn-outline-danger w-100 d-flex flex-column align-items-center">
                            <i class="bi bi-person fs-5"></i>
                            <small>Tài khoản</small>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Biến global để theo dõi trạng thái search
let isSearchOpen = false;

function toggleMobileSearch() {
    const overlay = document.getElementById('mobileSearchOverlay');
    const searchIcon = document.getElementById('search-icon');
    const closeIcon = document.getElementById('close-search-icon');
    const searchInput = overlay.querySelector('.mobile-search-input');
    
    if (!isSearchOpen) {
        // Mở search
        overlay.classList.remove('d-none');
        searchIcon.classList.add('d-none');
        closeIcon.classList.remove('d-none');
        document.body.style.overflow = 'hidden';
        isSearchOpen = true;
        
        // Focus input sau khi animation hoàn thành
        setTimeout(() => {
            if (searchInput) {
                searchInput.focus();
            }
        }, 100);
    } else {
        // Đóng search
        closeMobileSearch();
    }
}

function closeMobileSearch() {
    const overlay = document.getElementById('mobileSearchOverlay');
    const searchIcon = document.getElementById('search-icon');
    const closeIcon = document.getElementById('close-search-icon');
    const searchInput = overlay.querySelector('.mobile-search-input');
    
    overlay.classList.add('d-none');
    searchIcon.classList.remove('d-none');
    closeIcon.classList.add('d-none');
    document.body.style.overflow = '';
    isSearchOpen = false;
    
    // Reset input value
    if (searchInput) {
        searchInput.value = '';
    }
}

function searchSuggestion(query) {
    const searchInput = document.querySelector('.mobile-search-input');
    if (searchInput) {
        searchInput.value = query;
        document.querySelector('.search-form-mobile').submit();
    }
}

// Đóng search khi click bên ngoài
document.addEventListener('click', function(e) {
    if (isSearchOpen) {
        const overlay = document.getElementById('mobileSearchOverlay');
        const searchToggle = document.querySelector('.search-toggle');
        const searchContent = document.querySelector('.mobile-search-content');
        
        // Kiểm tra nếu click bên ngoài content và không phải search toggle
        if (overlay && !searchContent.contains(e.target) && !searchToggle.contains(e.target)) {
            closeMobileSearch();
        }
    }
});

// Đóng search khi nhấn phím Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && isSearchOpen) {
        closeMobileSearch();
    }
});

// Đảm bảo trạng thái được reset khi trang load
document.addEventListener('DOMContentLoaded', function() {
    isSearchOpen = false;
    const overlay = document.getElementById('mobileSearchOverlay');
    if (overlay && !overlay.classList.contains('d-none')) {
        closeMobileSearch();
    }
});
</script>