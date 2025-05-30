@extends('customer.layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
        </ol>
    </div>
</nav>

<!-- Products Section -->
<section class="products-section py-5">
    <div class="container">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="filters-sidebar bg-white rounded-4 shadow-sm p-4">
                    <!-- Filter Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">Bộ lọc</h5>
                        <button class="btn btn-sm btn-outline-danger" id="resetFilters">
                            <i class="fas fa-redo-alt me-1"></i>Đặt lại
                        </button>
                    </div>

                    <!-- Search Filter -->
                    <div class="filter-group mb-4">
                        <div class="d-flex flex-column flex-sm-row gap-2">
                            <input type="text" class="form-control w-100" placeholder="Tìm kiếm..." id="searchFilter">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>



                    <!-- Categories Filter -->
                    <div class="filter-group mb-4">
                        <h6 class="fw-semibold mb-3">Danh mục</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="giay-the-thao" id="category1">
                            <label class="form-check-label" for="category1">Giày thể thao</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="quan-ao-the-thao" id="category2">
                            <label class="form-check-label" for="category2">Quần áo thể thao</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="phu-kien" id="category3">
                            <label class="form-check-label" for="category3">Phụ kiện</label>
                        </div>
                    </div>

                    <!-- Brands Filter -->
                    <div class="filter-group mb-4">
                        <h6 class="fw-semibold mb-3">Thương hiệu</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="nike" id="brand1">
                            <label class="form-check-label" for="brand1">Nike</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="adidas" id="brand2">
                            <label class="form-check-label" for="brand2">Adidas</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="puma" id="brand3">
                            <label class="form-check-label" for="brand3">Puma</label>
                        </div>
                    </div>

                    <!-- Price Range Filter -->
                    <div class="filter-group mb-4">
                        <h6 class="fw-semibold mb-3">Khoảng giá</h6>
                        <div class="range-slider">
                            <input type="range" class="form-range" min="0" max="5000000" step="100000" id="priceRange">
                            <div class="d-flex justify-content-between mt-2">
                                <span class="text-muted small">0đ</span>
                                <span class="text-muted small">5.000.000đ</span>
                            </div>
                        </div>
                    </div>

                    <!-- Size Filter -->
                    <div class="filter-group mb-4">
                        <h6 class="fw-semibold mb-3">Kích thước</h6>
                        <div class="size-buttons d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-secondary btn-sm">36</button>
                            <button class="btn btn-outline-secondary btn-sm">37</button>
                            <button class="btn btn-outline-secondary btn-sm">38</button>
                            <button class="btn btn-outline-secondary btn-sm">39</button>
                            <button class="btn btn-outline-secondary btn-sm">40</button>
                            <button class="btn btn-outline-secondary btn-sm">41</button>
                            <button class="btn btn-outline-secondary btn-sm">42</button>
                            <button class="btn btn-outline-secondary btn-sm">43</button>
                        </div>
                    </div>

                    <!-- Color Filter -->
                    <div class="filter-group">
                        <h6 class="fw-semibold mb-3">Màu sắc</h6>
                        <div class="color-buttons d-flex flex-wrap gap-2">
                            <button class="btn btn-sm rounded-circle" style="width: 30px; height: 30px; background-color: #000;"></button>
                            <button class="btn btn-sm rounded-circle" style="width: 30px; height: 30px; background-color: #fff; border: 1px solid #ddd;"></button>
                            <button class="btn btn-sm rounded-circle" style="width: 30px; height: 30px; background-color: #dc3545;"></button>
                            <button class="btn btn-sm rounded-circle" style="width: 30px; height: 30px; background-color: #0d6efd;"></button>
                            <button class="btn btn-sm rounded-circle" style="width: 30px; height: 30px; background-color: #198754;"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-9">
                <!-- Products Header -->
                <div class="products-header bg-white rounded-4 shadow-sm p-3 mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <h5 class="fw-bold mb-0">Tất cả sản phẩm</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-md-end gap-3">
                                <!-- Sort Dropdown -->
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        Sắp xếp theo
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Mới nhất</a></li>
                                        <li><a class="dropdown-item" href="#">Giá tăng dần</a></li>
                                        <li><a class="dropdown-item" href="#">Giá giảm dần</a></li>
                                        <li><a class="dropdown-item" href="#">Bán chạy nhất</a></li>
                                    </ul>
                                </div>
                                <!-- View Toggle -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary active" data-view="grid">
                                        <i class="fas fa-th"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" data-view="list">
                                        <i class="fas fa-list"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="row g-4" id="products-grid">
                    @php
                    $products = [
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

                    @foreach($products as $product)
                    <div class="col-xl-4 col-md-6">
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
                                    <a href="{{ route('products.show', $product['id']) }}" class="text-decoration-none text-dark">
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

                <!-- Pagination -->
                <nav class="mt-5" aria-label="Product pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('customer/css/products.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('customer/js/products.js') }}"></script>
@endpush 