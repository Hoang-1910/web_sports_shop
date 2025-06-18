@extends('customer.layouts.app') {{-- Đổi nếu layout bạn khác tên --}}

@section('title', 'Kết quả tìm kiếm')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h4 class="fw-bold mb-0">
                <i class="bi bi-search me-2"></i>
                Kết quả tìm kiếm cho: <span class="text-primary">"{{ $q }}"</span>
            </h4>
            <span class="text-muted">
                @if ($products->total())
                    Tìm thấy <b>{{ $products->total() }}</b> sản phẩm
                @else
                    Không có sản phẩm phù hợp
                @endif
            </span>
        </div>

        @if ($products->count())
            <!-- Optionally, cho toggle grid/list nếu bạn dùng -->
            <div class="d-flex mb-3 justify-content-end">
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

            @if (request('view', 'grid') == 'list')
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-12 mb-3">
                            <article
                                class="product-card-list bg-white rounded-4 shadow-sm d-flex flex-row overflow-hidden position-relative">
                                <!-- Product Image -->
                                <div class="p-2 flex-shrink-0" style="width: 130px; aspect-ratio: 1.1/1;">
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                        class="w-100 h-100 object-fit-cover rounded-3" alt="{{ $product->name }}"
                                        loading="lazy">
                                </div>
                                <!-- Product Info -->
                                <div class="p-3 flex-grow-1">
                                    <h5 class="fw-semibold mb-1">
                                        <a href="{{ route('customer.products.show', $product->id) }}"
                                            class="text-decoration-none text-dark">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
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
                                            Tiết kiệm {{ number_format($product->original_price - $product->price) }}đ
                                        </div>
                                    @endif
                                    <div class="d-flex gap-2 align-items-center">
                                        <form action="{{ route('customer.wishlist.add') }}" method="POST"
                                            class="wishlist-form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button class="btn btn-light btn-sm wishlist-btn" type="submit"
                                                aria-label="Thêm vào danh sách yêu thích">
                                                <i class="far fa-heart"></i>
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
                    @endforeach
                </div>
            @else
                <div class="row g-4">
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <article
                                class="product-card-custom position-relative bg-white rounded-4 overflow-hidden shadow-sm h-100 product-hover-effect">
                                <!-- Wishlist Button -->
                                <form action="{{ route('customer.wishlist.add') }}" method="POST"
                                    class="wishlist-form position-absolute top-0 end-0 m-2 z-3">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="btn btn-light btn-sm wishlist-btn" type="submit"
                                        aria-label="Thêm vào danh sách yêu thích">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </form>
                                <!-- Product Image -->
                                <div class="product-img-box position-relative w-100" style="aspect-ratio: 1.1/1;">
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                        class="w-100 h-100 object-fit-cover" alt="{{ $product->name }}" loading="lazy">
                                    <a href="{{ route('customer.products.show', $product->id) }}"
                                        class="btn btn-danger add-to-cart-btn position-absolute start-0 bottom-0 w-100 rounded-0 opacity-0 translate-y-100 transition-all">
                                        <i class="fas fa-shopping-cart me-2"></i>Thêm vào giỏ
                                    </a>
                                </div>
                                <!-- Product Info -->
                                <div class="p-3">
                                    <h5 class="fw-semibold mb-2">
                                        <a href="{{ route('customer.products.show', $product->id) }}"
                                            class="text-decoration-none text-dark">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
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
                                            Tiết kiệm {{ number_format($product->original_price - $product->price) }}đ
                                        </div>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-4">
                {{ $products->appends(request()->query())->links() }}
            </div>
        @else
            <div class="alert alert-warning text-center p-5 mt-4 rounded-3 shadow-sm">
                <i class="bi bi-emoji-frown" style="font-size:3rem;"></i>
                <div class="mt-3 fw-semibold">
                    Rất tiếc, không tìm thấy sản phẩm phù hợp với từ khóa <span
                        class="text-primary">"{{ $q }}"</span>.
                </div>
                <div class="mt-2">
                    Thử từ khóa khác, hoặc kiểm tra lại lỗi chính tả bạn nhé!
                </div>
            </div>
        @endif

    </div>
@endsection
