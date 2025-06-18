@extends('customer.layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('customer.home') }}" class="text-decoration-none">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
        </div>
    </nav>

    <!-- Products Section -->
    <section class="products-section py-5">
        <div class="container">
            <div class="row">
                <!-- Filters Sidebar -->
                <form class="col-lg-3" method="GET" action="{{ route('customer.products.index') }}" id="filterForm">
                    <div class="filters-sidebar bg-white rounded-4 shadow-sm p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0">Bộ lọc</h5>
                            <button class="btn btn-sm btn-outline-danger" type="button" id="resetFilters">
                                <i class="fas fa-redo-alt me-1"></i>Đặt lại
                            </button>
                        </div>

                        <!-- Search Filter -->
                        <div class="filter-group mb-4">
                            <div class="d-flex flex-column flex-sm-row gap-2">
                                <input type="text" class="form-control w-100" placeholder="Tìm kiếm..." name="name"
                                    value="{{ request('name') }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Brands Filter -->
                        <div class="filter-group mb-4">
                            <h6 class="fw-semibold mb-3">Thương hiệu</h6>
                            @foreach ($brands as $brand)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="brands[]"
                                        value="{{ $brand }}" id="brand{{ \Illuminate\Support\Str::slug($brand) }}"
                                        {{ is_array(request('brands')) && in_array($brand, request('brands')) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="brand{{ \Illuminate\Support\Str::slug($brand) }}">{{ $brand }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Price Range Filter -->
                        <div class="filter-group mb-4">
                            <h6 class="fw-semibold mb-3">Khoảng giá</h6>
                            <div class="d-flex flex-row gap-2">
                                <input type="number" class="form-control" min="0" max="5000000" step="1000"
                                    name="price_min" placeholder="Từ" value="{{ request('price_min') }}">
                                <input type="number" class="form-control" min="0" max="5000000" step="1000"
                                    name="price_max" placeholder="Đến" value="{{ request('price_max') }}">
                            </div>
                        </div>

                        <!-- Size Filter -->
                        <div class="filter-group mb-4">
                            <h6 class="fw-semibold mb-3">Kích thước</h6>
                            <div class="size-buttons d-flex flex-wrap gap-2">
                                @foreach ($sizes as $size)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="sizes[]"
                                            value="{{ $size }}" id="size{{ $size }}"
                                            {{ is_array(request('sizes')) && in_array($size, request('sizes')) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="size{{ $size }}">{{ $size }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Color Filter -->
                        <div class="filter-group mb-4">
                            <h6 class="fw-semibold mb-3">Màu sắc</h6>
                            <div class="color-buttons d-flex flex-wrap gap-2">
                                @foreach ($colors as $color)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="colors[]"
                                            value="{{ $color }}" id="color{{ $color }}"
                                            {{ is_array(request('colors')) && in_array($color, request('colors')) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="color{{ $color }}">{{ $color }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary" type="submit">Lọc sản phẩm</button>
                        </div>
                    </div>
                </form>

                <script>
                    // Reset filter: reload về trang không tham số GET
                    document.getElementById('resetFilters').onclick = function() {
                        window.location.href = "{{ route('customer.products.index') }}";
                    };
                </script>

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
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                            Sắp xếp theo
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item {{ request('sort') == null ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['sort' => null]) }}">
                                                    Mới nhất
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item {{ request('sort') == 'price_asc' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">
                                                    Giá tăng dần
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item {{ request('sort') == 'price_desc' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">
                                                    Giá giảm dần
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- View Toggle -->
                                    <div class="btn-group">
                                        <a href="{{ request()->fullUrlWithQuery(['view' => 'grid']) }}"
                                            class="btn btn-outline-secondary {{ request('view', 'grid') == 'grid' ? 'active' : '' }}">
                                            <i class="fas fa-th"></i>
                                        </a>
                                        <a href="{{ request()->fullUrlWithQuery(['view' => 'list']) }}"
                                            class="btn btn-outline-secondary {{ request('view') == 'list' ? 'active' : '' }}">
                                            <i class="fas fa-list"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (request('view', 'grid') == 'list')
                        <div class="row" id="products-list">
                            @forelse($products as $product)
                                <!-- LIST VIEW ITEM -->
                                <div class="col-12">
                                    <article
                                        class="product-card-list bg-white rounded-4 shadow-sm d-flex flex-row overflow-hidden mb-3 position-relative">
                                        <!-- Product Image -->
                                        <div class="p-2 flex-shrink-0" style="width: 160px; aspect-ratio: 1.1/1;">
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                class="w-100 h-100 object-fit-cover rounded-3" alt="{{ $product->name }}"
                                                loading="lazy">
                                        </div>
                                        <!-- Product Info -->
                                        <div class="p-3 flex-grow-1">
                                            <h3 class="fw-semibold mb-1 h6">
                                                <a href="{{ route('customer.products.show', $product->id) }}"
                                                    class="text-decoration-none text-dark">
                                                    {{ $product->name }}
                                                </a>
                                            </h3>
                                            <div class="d-flex align-items-center gap-2 mb-2">
                                                <span class="text-danger fw-bold h6 mb-0">
                                                    {{ number_format($product->price) }}đ
                                                </span>
                                                @if ($product->original_price && $product->original_price > $product->price)
                                                    <span class="text-muted text-decoration-line-through small">
                                                        {{ number_format($product->original_price) }}đ
                                                    </span>
                                                @endif
                                            </div>
                                            @if ($product->original_price && $product->original_price > $product->price)
                                                <div class="text-success small mb-1">
                                                    Tiết kiệm
                                                    {{ number_format($product->original_price - $product->price) }}đ
                                                </div>
                                            @endif

                                            <div class="d-flex gap-2 align-items-center">
                                                <form action="{{ route('customer.wishlist.add') }}" method="POST"
                                                    class="wishlist-form">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <button class="btn btn-light btn-sm wishlist-btn" type="submit"
                                                        aria-label="Thêm vào danh sách yêu thích">
                                                        <i class="far fa-heart" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('customer.products.show', $product->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-shopping-cart me-1"></i>Thêm vào giỏ
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-warning text-center">Không tìm thấy sản phẩm nào.</div>
                                </div>
                            @endforelse
                        </div>
                    @else
                        <div class="row g-4" id="products-grid">
                            @forelse($products as $product)
                                <!-- GRID VIEW ITEM -->
                                <div class="col-xl-4 col-md-6">
                                    <article
                                        class="product-card-custom position-relative bg-white rounded-4 overflow-hidden shadow-sm h-100 product-hover-effect">
                                        <!-- Wishlist Button -->
                                        <form action="{{ route('customer.wishlist.add') }}" method="POST"
                                            class="wishlist-form position-absolute top-0 end-0 m-2 z-3">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button class="btn btn-light btn-sm wishlist-btn" type="submit"
                                                aria-label="Thêm vào danh sách yêu thích">
                                                <i class="far fa-heart" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <!-- Product Image -->
                                        <div class="product-img-box position-relative w-100" style="aspect-ratio: 1.1/1;">
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                class="w-100 h-100 object-fit-cover" alt="{{ $product->name }}"
                                                loading="lazy">
                                            <a href="{{ route('customer.products.show', $product->id) }}"
                                                class="btn btn-danger add-to-cart-btn position-absolute start-0 bottom-0 w-100 rounded-0 opacity-0 translate-y-100 transition-all">
                                                <i class="fas fa-shopping-cart me-2" aria-hidden="true"></i>Thêm vào giỏ
                                            </a>
                                        </div>
                                        <!-- Product Info -->
                                        <div class="p-3">
                                            <h3 class="fw-semibold mb-2 h6">
                                                <a href="{{ route('customer.products.show', $product->id) }}"
                                                    class="text-decoration-none text-dark">
                                                    {{ $product->name }}
                                                </a>
                                            </h3>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="text-danger fw-bold h6 mb-0">
                                                    {{ number_format($product->price) }}đ
                                                </span>
                                                @if ($product->original_price && $product->original_price > $product->price)
                                                    <span class="text-muted text-decoration-line-through small">
                                                        {{ number_format($product->original_price) }}đ
                                                    </span>
                                                @endif
                                            </div>
                                            @if ($product->original_price && $product->original_price > $product->price)
                                                <div class="text-success small">
                                                    Tiết kiệm
                                                    {{ number_format($product->original_price - $product->price) }}đ
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
                    @endif
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
@endpush
