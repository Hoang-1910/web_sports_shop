<!-- Navigation Bar -->
@prepend('styles')
    <link href="{{ asset('customer/css/navbar.css') }}" rel="stylesheet">
@endprepend

<header class="bg-white border-bottom py-2">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <!-- Logo -->
    <div class="d-flex align-items-center gap-3">
      <a href="#" class="d-flex align-items-center justify-content-center" style="width:50px;height:50px;background:#f3f3f3;border-radius:4px;">
        <span class="visually-hidden">Logo</span>
        <i class="bi bi-image" style="font-size:2rem;color:#ccc;"></i>
      </a>
    </div>
    <!-- Desktop Menu -->
    <nav class="d-none d-lg-flex align-items-center gap-4 flex-grow-1 ms-4">
      <a href="#" class="nav-link px-2 text-dark">Trang chủ</a>
      <div class="dropdown">
        <a class="nav-link px-2 text-dark dropdown-toggle" href="#" id="dropdownSanPham" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sản phẩm</a>
        <ul class="dropdown-menu" aria-labelledby="dropdownSanPham">
          <li><a class="dropdown-item" href="#">Tất cả</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <a class="nav-link px-2 text-dark dropdown-toggle" href="#" id="dropdownThuongHieu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thương hiệu</a>
        <ul class="dropdown-menu" aria-labelledby="dropdownThuongHieu">
          <li><a class="dropdown-item" href="#">Tất cả</a></li>
        </ul>
      </div>
      <a href="#" class="nav-link px-2 text-dark">Khuyến mãi</a>
      <a href="#" class="nav-link px-2 text-dark">Blog</a>
      <a href="#" class="nav-link px-2 text-dark">Liên hệ</a>
    </nav>
    <!-- Search Bar -->
    <form class="d-none d-lg-flex align-items-center position-relative mx-4 flex-shrink-0" style="min-width:320px;max-width:400px;width:100%;" role="search">
      <input class="form-control ps-4" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" style="border-radius:12px;">
      <span class="position-absolute end-0 pe-3" style="top:50%;transform:translateY(-50%);color:#b0b8c1;">
        <i class="bi bi-search"></i>
      </span>
    </form>
    <!-- Icons -->
    <div class="d-none d-lg-flex align-items-center gap-4 me-4">
      <a href="#" class="text-dark position-relative d-flex align-items-center text-decoration-none"><i class="bi bi-person fs-5"></i></a>
      <a href="#" class="text-dark position-relative d-flex align-items-center text-decoration-none"><i class="bi bi-heart fs-5"></i></a>
      <a href="#" class="text-dark position-relative d-flex align-items-center text-decoration-none">
        <i class="bi bi-cart fs-5"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.75rem;">3</span>
      </a>
    </div>
    <!-- Mobile menu button -->
    <button class="btn d-lg-none p-2 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas" style="background:#222;border-radius:8px;">
      <i class="bi bi-list" style="font-size:1.7rem;color:#fff;"></i>
    </button>
  </div>
</header>
<!-- Offcanvas sidebar for mobile -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <nav class="nav flex-column gap-2">
      <a href="#" class="nav-link">Trang chủ</a>
      <a href="#" class="nav-link">Sản phẩm</a>
      <a href="#" class="nav-link">Thương hiệu</a>
      <a href="#" class="nav-link">Khuyến mãi</a>
      <a href="#" class="nav-link">Blog</a>
      <a href="#" class="nav-link">Liên hệ</a>
    </nav>
    <form class="mt-3" role="search">
      <input class="form-control" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
    </form>
    <div class="d-flex align-items-center gap-3 mt-4">
      <a href="#" class="text-dark position-relative d-flex align-items-center text-decoration-none"><i class="bi bi-person fs-5"></i></a>
      <a href="#" class="text-dark position-relative d-flex align-items-center text-decoration-none"><i class="bi bi-heart fs-5"></i></a>
      <a href="#" class="text-dark position-relative d-flex align-items-center text-decoration-none ms-2">
        <i class="bi bi-cart fs-5"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.75rem;">3</span>
      </a>
    </div>
  </div>
</div>
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@push('scripts')
    <script src="{{ asset('customer/js/navbar.js') }}"></script>
@endpush
