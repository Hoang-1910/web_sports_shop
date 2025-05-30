@extends('customer.layouts.app')

@section('title', 'Danh sách yêu thích')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách yêu thích</li>
        </ol>
    </div>
</nav>

<!-- Wishlist Section -->
<section class="wishlist py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wishlist-header bg-white rounded-4 shadow-sm p-4 mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <h1 class="h3 fw-bold mb-0">Danh sách yêu thích</h1>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p class="text-muted mb-0">Bạn có <span class="fw-bold text-danger">{{ count($wishlist) }}</span> sản phẩm trong danh sách yêu thích</p>
                        </div>
                    </div>
                </div>

                <!-- Wishlist Items -->
                <div class="wishlist-items">
                    @forelse($wishlist as $item)
                    <div class="wishlist-item bg-white rounded-4 shadow-sm p-4 mb-4">
                        <div class="row align-items-center">
                            <!-- Product Image -->
                            <div class="col-md-2 col-4 mb-3 mb-md-0">
                                <a href="{{ route('products.show', $item['id']) }}" class="product-image d-block">
                                    <img src="{{ asset($item['image']) }}" 
                                         class="img-fluid rounded-3" 
                                         alt="{{ $item['name'] }}">
                                </a>
                            </div>

                            <!-- Product Info -->
                            <div class="col-md-4 col-8 mb-3 mb-md-0">
                                <h5 class="product-title mb-2">
                                    <a href="{{ route('products.show', $item['id']) }}" class="text-decoration-none text-dark">
                                        {{ $item['name'] }}
                                    </a>
                                </h5>
                                <div class="product-meta text-muted small">
                                    <p class="mb-1">Thương hiệu: {{ $item['brand'] }}</p>
                                    <p class="mb-0">Danh mục: {{ $item['category']['name'] }}</p>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-md-2 col-6 mb-3 mb-md-0">
                                <div class="product-price">
                                    <span class="text-danger fw-bold">{{ number_format($item['price']) }}đ</span>
                                    @if(isset($item['discount']) && $item['discount'] > 0)
                                    <div class="text-muted text-decoration-line-through small">
                                        {{ number_format($item['price'] * (1 + $item['discount']/100)) }}đ
                                    </div>
                                    <span class="badge bg-danger">-{{ $item['discount'] }}%</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Stock Status -->
                            <div class="col-md-2 col-6 mb-3 mb-md-0">
                                <div class="stock-status">
                                    <span class="badge bg-success">Còn hàng</span>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="col-md-2 col-12">
                                <div class="d-flex flex-column gap-2">
                                    <button class="btn btn-danger add-to-cart" data-product-id="{{ $item['id'] }}">
                                        <i class="fas fa-shopping-cart me-2"></i>Thêm vào giỏ
                                    </button>
                                    <button class="btn btn-outline-danger remove-from-wishlist" data-product-id="{{ $item['id'] }}">
                                        <i class="fas fa-trash-alt me-2"></i>Xóa
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="empty-wishlist bg-white rounded-4 shadow-sm p-5 text-center">
                        <div class="empty-icon mb-4">
                            <i class="far fa-heart fa-4x text-muted"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Danh sách yêu thích trống</h3>
                        <p class="text-muted mb-4">Bạn chưa thêm sản phẩm nào vào danh sách yêu thích.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-danger">
                            <i class="fas fa-shopping-bag me-2"></i>Tiếp tục mua sắm
                        </a>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($wishlist->hasPages())
                <div class="pagination-wrapper mt-4">
                    {{ $wishlist->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('customer/css/wishlist.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('customer/js/wishlist.js') }}"></script>
@endpush 