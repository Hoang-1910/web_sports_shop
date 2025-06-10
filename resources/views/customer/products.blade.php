@extends('customer.layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('customer.home') }}" class="text-decoration-none">Trang chủ</a></li>
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
                        @foreach($categories as $category)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="{{ $category->slug }}" id="category{{ $category->id }}">
                            <label class="form-check-label" for="category{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                        @endforeach
                    </div>
                    <!-- Brands Filter -->
                    <div class="filter-group mb-4">
                        <h6 class="fw-semibold mb-3">Thương hiệu</h6>
                        @foreach($brands as $brand)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="{{ $brand }}" id="brand{{ \Illuminate\Support\Str::slug($brand) }}">
                            <label class="form-check-label" for="brand{{ \Illuminate\Support\Str::slug($brand) }}">{{ $brand }}</label>
                        </div>
                        @endforeach
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
                            @foreach($sizes as $size)
                                <button class="btn btn-sm btn-outline-secondary" type="button" data-size="{{ $size }}">
                                    {{ $size }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <!-- Color Filter -->
                    <div class="filter-group">
                        <h6 class="fw-semibold mb-3">Màu sắc</h6>
                        <div class="color-buttons d-flex flex-wrap gap-2">
                            @foreach($colors as $color)
                                <button class="btn btn-sm" type="button" data-color="{{ $color }}">
                                    {{ $color }}
                                </button>
                            @endforeach
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
                    @forelse($products as $product)
                    <div class="col-xl-4 col-md-6">
                        <article class="product-card-custom position-relative bg-white rounded-4 overflow-hidden shadow-sm h-100 product-hover-effect">
                            <!-- Wishlist Button -->
                            <form action="{{ route('customer.wishlist.add') }}" method="POST" class="wishlist-form position-absolute top-0 end-0 m-2 z-3">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-light btn-sm wishlist-btn" type="submit" aria-label="Thêm vào danh sách yêu thích">
                                    <i class="far fa-heart" aria-hidden="true"></i>
                                </button>
                            </form>
                            <!-- Product Image -->
                            <div class="product-img-box position-relative w-100" style="aspect-ratio: 1.1/1;">
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     class="w-100 h-100 object-fit-cover" 
                                     alt="{{ $product->name }}"
                                     loading="lazy">
                                <a href="{{ route('customer.products.show', $product->id) }}" class="btn btn-danger add-to-cart-btn position-absolute start-0 bottom-0 w-100 rounded-0 opacity-0 translate-y-100 transition-all">
                                    <i class="fas fa-shopping-cart me-2" aria-hidden="true"></i>Thêm vào giỏ
                                </a>
                            </div>
                            <!-- Product Info -->
                            <div class="p-3">
                                <h3 class="fw-semibold mb-2 h6">
                                    <a href="{{ route('customer.products.show', $product->id) }}" class="text-decoration-none text-dark">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-danger fw-bold h6 mb-0">
                                        {{ number_format($product->price) }}đ
                                    </span>
                                    @if($product->original_price && $product->original_price > $product->price)
                                    <span class="text-muted text-decoration-line-through small">
                                        {{ number_format($product->original_price) }}đ
                                    </span>
                                    @endif
                                </div>
                                @if($product->original_price && $product->original_price > $product->price)
                                <div class="text-success small">
                                    Tiết kiệm {{ number_format($product->original_price - $product->price) }}đ
                                </div>
                                @endif
                            </div>
                        </article>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">Không tìm thấy sản phẩm nào.</div>
                    </div>
                    @endforelse
                </div>
                <!-- Pagination -->
                <nav class="mt-5" aria-label="Product pagination">
                    {{ $products->links() }}
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