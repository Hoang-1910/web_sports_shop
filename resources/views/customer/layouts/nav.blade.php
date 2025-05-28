<!-- Navigation Bar -->
@prepend('styles')
    <link href="{{ asset('customer/css/navbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endprepend

<header class="navbar-header bg-white shadow-sm sticky-top">
  <div class="container-fluid px-3 px-lg-4">
    <nav class="navbar navbar-expand-lg navbar-light p-0">
      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center me-4" href="">
        <div class="logo-container d-flex align-items-center justify-content-center">
          <img src="{{ asset('customer/images/logo.jpg') }}" alt="Logo" class="logo-img" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
          <div class="logo-placeholder d-none align-items-center justify-content-center">
            <i class="bi bi-shop text-white fs-2"></i>
          </div>
        </div>
        <span class="brand-text ms-2 fw-bold text-dark d-none d-md-inline">YourBrand</span>
      </a>

      <!-- Mobile Search Toggle -->
      <button class="btn btn-outline-danger d-lg-none me-2 search-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSearch" aria-expanded="false" aria-controls="mobileSearch">
        <i class="bi bi-search"></i>
      </button>

      <!-- Mobile Menu Toggle -->
      <button class="navbar-toggler border-0 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Desktop Navigation -->
      <div class="collapse navbar-collapse">
        <!-- Main Navigation Links -->
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link fw-medium" href="">Trang chủ</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-medium" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Sản phẩm
            </a>
            <ul class="dropdown-menu shadow border-0">
              <li><a class="dropdown-item" href="">Tất cả sản phẩm</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Danh mục 1</a></li>
              <li><a class="dropdown-item" href="#">Danh mục 2</a></li>
              <li><a class="dropdown-item" href="#">Danh mục 3</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-medium" href="#" id="brandsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Thương hiệu
            </a>
            <ul class="dropdown-menu shadow border-0">
              <li><a class="dropdown-item" href="">Tất cả thương hiệu</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Thương hiệu A</a></li>
              <li><a class="dropdown-item" href="#">Thương hiệu B</a></li>
              <li><a class="dropdown-item" href="#">Thương hiệu C</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="">Khuyến mãi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="">Liên hệ</a>
          </li>
        </ul>

        <!-- Desktop Search Bar -->
        <div class="d-none d-lg-flex me-4">
          <form class="search-form position-relative" role="search" action="" method="GET">
            <input class="form-control search-input" type="search" name="q" placeholder="Tìm kiếm sản phẩm..." value="{{ request('q') }}">
            <button class="search-btn position-absolute" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </div>

        <!-- Desktop Action Icons -->
        <div class="d-none d-lg-flex align-items-center gap-3">
          <!-- User Account -->
          @auth
            <div class="dropdown">
              <a class="nav-icon-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-5"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                <li><a class="dropdown-item" href="">Tài khoản</a></li>
                <li><a class="dropdown-item" href="">Đơn hàng</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item">Đăng xuất</button>
                  </form>
                </li>
              </ul>
            </div>
          @else
            <a href="" class="nav-icon-link" title="Đăng nhập">
              <i class="bi bi-person fs-5"></i>
            </a>
          @endauth

          <!-- Wishlist -->
          <a href="" class="nav-icon-link position-relative" title="Yêu thích">
            <i class="bi bi-heart fs-5"></i>
            @if(isset($wishlistCount) && $wishlistCount > 0)
              <span class="nav-badge">{{ $wishlistCount }}</span>
            @endif
          </a>

          <!-- Shopping Cart -->
          <a href="" class="nav-icon-link position-relative" title="Giỏ hàng">
            <i class="bi bi-cart fs-5"></i>
            @if(isset($cartCount) && $cartCount > 0)
              <span class="nav-badge">{{ $cartCount }}</span>
            @endif
          </a>
        </div>
      </div>
    </nav>

    <!-- Mobile Search Bar - Fixed Layout -->
    <div class="collapse mobile-search-container" id="mobileSearch">
      <div class="py-3">
        <form class="search-form-mobile" role="search" action="" method="GET">
          <div class="input-group">
            <input class="form-control mobile-search-input" type="search" name="q" placeholder="Tìm kiếm sản phẩm..." value="{{ request('q') }}">
            <button class="btn btn-danger mobile-search-btn" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>

<!-- Mobile Offcanvas Menu -->
<div class="offcanvas offcanvas-start mobile-menu" tabindex="-1" id="mobileMenu">
  <div class="offcanvas-header border-bottom bg-danger text-white">
    <h5 class="offcanvas-title fw-bold">Menu</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body p-0">
    <!-- Mobile User Section -->
    <div class="mobile-user-section p-3 bg-light">
      @auth
        <div class="d-flex align-items-center">
          <div class="user-avatar me-3">
            <i class="bi bi-person-circle fs-2 text-danger"></i>
          </div>
          <div>
            <h6 class="mb-1">{{ Auth::user()->name }}</h6>
            <small class="text-muted">{{ Auth::user()->email }}</small>
          </div>
        </div>
      @else
        <div class="d-grid gap-2">
          <a href="" class="btn btn-danger">Đăng nhập</a>
          <a href="" class="btn btn-outline-danger">Đăng ký</a>
        </div>
      @endauth
    </div>

    <!-- Mobile Navigation Links -->
    <nav class="mobile-nav">
      <a href="" class="mobile-nav-link">
        <i class="bi bi-house me-3"></i>Trang chủ
      </a>
      
      <div class="mobile-nav-section">
        <div class="mobile-nav-header" data-bs-toggle="collapse" data-bs-target="#mobileProducts" aria-expanded="false" aria-controls="mobileProducts">
          <i class="bi bi-grid me-3"></i>Sản phẩm
          <i class="bi bi-chevron-down ms-auto"></i>
        </div>
        <div class="collapse" id="mobileProducts">
          <a href="" class="mobile-nav-sublink">Tất cả sản phẩm</a>
          <a href="#" class="mobile-nav-sublink">Danh mục 1</a>
          <a href="#" class="mobile-nav-sublink">Danh mục 2</a>
          <a href="#" class="mobile-nav-sublink">Danh mục 3</a>
        </div>
      </div>

      <div class="mobile-nav-section">
        <div class="mobile-nav-header" data-bs-toggle="collapse" data-bs-target="#mobileBrands" aria-expanded="false" aria-controls="mobileBrands">
          <i class="bi bi-award me-3"></i>Thương hiệu
          <i class="bi bi-chevron-down ms-auto"></i>
        </div>
        <div class="collapse" id="mobileBrands">
          <a href="" class="mobile-nav-sublink">Tất cả thương hiệu</a>
          <a href="#" class="mobile-nav-sublink">Thương hiệu A</a>
          <a href="#" class="mobile-nav-sublink">Thương hiệu B</a>
          <a href="#" class="mobile-nav-sublink">Thương hiệu C</a>
        </div>
      </div>

      <a href="" class="mobile-nav-link">
        <i class="bi bi-percent me-3"></i>Khuyến mãi
      </a>
      <a href="" class="mobile-nav-link">
        <i class="bi bi-journal-text me-3"></i>Blog
      </a>
      <a href="" class="mobile-nav-link">
        <i class="bi bi-envelope me-3"></i>Liên hệ
      </a>
    </nav>

    <!-- Mobile Action Buttons -->
    <div class="mobile-actions p-3 border-top mt-auto">
      <div class="row g-2">
        <div class="col-4">
          <a href="" class="btn btn-outline-danger w-100 d-flex flex-column align-items-center">
            <i class="bi bi-heart"></i>
            <small>Yêu thích</small>
          </a>
        </div>
        <div class="col-4">
          <a href="" class="btn btn-outline-danger w-100 d-flex flex-column align-items-center position-relative">
            <i class="bi bi-cart"></i>
            <small>Giỏ hàng</small>
            @if(isset($cartCount) && $cartCount > 0)
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">
                {{ $cartCount }}
              </span>
            @endif
          </a>
        </div>
        <div class="col-4">
          @auth
            <a href="" class="btn btn-outline-danger w-100 d-flex flex-column align-items-center">
              <i class="bi bi-bag"></i>
              <small>Đơn hàng</small>
            </a>
          @else
            <a href="" class="btn btn-outline-danger w-100 d-flex flex-column align-items-center">
              <i class="bi bi-person"></i>
              <small>Tài khoản</small>
            </a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</div>