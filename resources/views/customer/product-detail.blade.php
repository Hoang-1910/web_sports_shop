@extends('customer.layouts.app')

@section('title', $product['name'])

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product['name'] }}</li>
        </ol>
    </div>
</nav>

<!-- Product Detail Section -->
<section class="product-detail py-5">
    <div class="container">
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="product-images bg-white rounded-4 shadow-sm p-4">
                    <!-- Main Image -->
                    <div class="main-image position-relative mb-4">
                        <img src="{{ asset($product['image']) }}" 
                             class="img-fluid rounded-3" 
                             alt="{{ $product['name'] }}"
                             id="mainProductImage">
                    </div>
                    
                    <!-- Thumbnail Images -->
                    <div class="thumbnail-images d-flex gap-2">
                        <div class="thumbnail active" data-image="{{ asset($product['image']) }}">
                            <img src="{{ asset($product['image']) }}" 
                                 class="img-fluid rounded-2" 
                                 alt="Thumbnail">
                        </div>
                        @foreach($product['images'] as $image)
                        <div class="thumbnail" data-image="{{ asset($image['image_path']) }}">
                            <img src="{{ asset($image['image_path']) }}" 
                                 class="img-fluid rounded-2" 
                                 alt="Thumbnail">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="product-info bg-white rounded-4 shadow-sm p-4">
                    <h1 class="h2 fw-bold mb-3">{{ $product['name'] }}</h1>
                    
                    <!-- Price -->
                    <div class="price-info mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <span class="h3 text-danger fw-bold mb-0">
                                {{ number_format($product['price']) }}đ
                            </span>
                            @if(isset($product['discount']) && $product['discount'] > 0)
                            <span class="text-muted text-decoration-line-through">
                                {{ number_format($product['price'] * (1 + $product['discount']/100)) }}đ
                            </span>
                            <span class="badge bg-danger">
                                -{{ $product['discount'] }}%
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="description mb-4">
                        <p class="text-muted mb-0">{{ $product['description'] }}</p>
                    </div>

                    <!-- Variants -->
                    @if(isset($product['variants']) && count($product['variants']) > 0)
                    <div class="variants mb-4">
                        <!-- Size Selection -->
                        <div class="size-selection mb-3">
                            <label class="form-label fw-medium">Kích thước</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach(collect($product['variants'])->pluck('size')->unique() as $size)
                                <button type="button" class="btn btn-outline-secondary size-btn" data-size="{{ $size }}">
                                    {{ $size }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Color Selection -->
                        <div class="color-selection mb-3">
                            <label class="form-label fw-medium">Màu sắc</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach(collect($product['variants'])->pluck('color')->unique() as $color)
                                <button type="button" class="btn btn-outline-secondary color-btn" data-color="{{ $color }}">
                                    {{ $color }}
                                </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Quantity -->
                    <div class="quantity mb-4">
                        <label class="form-label fw-medium">Số lượng</label>
                        <div class="input-group" style="width: 150px;">
                            <button class="btn btn-outline-secondary" type="button" id="decreaseQuantity">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="form-control text-center" id="quantity" value="1" min="1">
                            <button class="btn btn-outline-secondary" type="button" id="increaseQuantity">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons d-grid gap-2">
                        <button type="button" class="btn btn-danger btn-lg" id="addToCart">
                            <i class="fas fa-shopping-cart me-2"></i>Thêm vào giỏ
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-lg" id="addToWishlist">
                            <i class="far fa-heart me-2"></i>Thêm vào yêu thích
                        </button>
                    </div>

                    <!-- Product Meta -->
                    <div class="product-meta mt-4 pt-4 border-top">
                        <div class="d-flex flex-wrap gap-4">
                            <div class="meta-item">
                                <span class="text-muted">Thương hiệu:</span>
                                <span class="fw-medium">{{ $product['brand'] }}</span>
                            </div>
                            <div class="meta-item">
                                <span class="text-muted">Danh mục:</span>
                                <span class="fw-medium">{{ $product['category']['name'] }}</span>
                            </div>
                            <div class="meta-item">
                                <span class="text-muted">Tình trạng:</span>
                                <span class="fw-medium text-success">Còn hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="product-tabs bg-white rounded-4 shadow-sm">
                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">
                                Mô tả
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">
                                Đánh giá
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content p-4" id="productTabsContent">
                        <!-- Description Tab -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="product-description">
                                {!! $product['description'] !!}
                            </div>
                        </div>
                        
                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews-section">
                                <!-- Review Summary -->
                                <div class="review-summary mb-4">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 text-center">
                                            @php
                                                $avgRating = collect($product['reviews'])->avg('rating');
                                                $totalReviews = count($product['reviews']);
                                            @endphp
                                            <h3 class="display-4 fw-bold mb-0">{{ number_format($avgRating, 1) }}</h3>
                                            <div class="stars text-warning mb-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= floor($avgRating))
                                                        <i class="fas fa-star"></i>
                                                    @elseif($i - 0.5 <= $avgRating)
                                                        <i class="fas fa-star-half-alt"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <p class="text-muted mb-0">Dựa trên {{ $totalReviews }} đánh giá</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="rating-bars">
                                                @for($i = 5; $i >= 1; $i--)
                                                @php
                                                    $count = collect($product['reviews'])->where('rating', $i)->count();
                                                    $percentage = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                                                @endphp
                                                <div class="rating-bar d-flex align-items-center mb-2">
                                                    <span class="text-muted me-2">{{ $i }} sao</span>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-warning" style="width: {{ $percentage }}%"></div>
                                                    </div>
                                                    <span class="text-muted ms-2">{{ $count }}</span>
                                                </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Review List -->
                                <div class="review-list">
                                    @forelse($product['reviews'] as $review)
                                    <div class="review-item border-bottom pb-4 mb-4">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="fw-bold mb-1">{{ $review['user']['name'] }}</h6>
                                                <div class="stars text-warning mb-2">
                                                    @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star{{ $i <= $review['rating'] ? '' : '-o' }}"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <small class="text-muted">{{ $review['created_at']->format('d/m/Y') }}</small>
                                        </div>
                                        <p class="mb-0">{{ $review['comment'] }}</p>
                                    </div>
                                    @empty
                                    <div class="text-center py-4">
                                        <p class="text-muted mb-0">Chưa có đánh giá nào cho sản phẩm này.</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('customer/css/product-detail.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('customer/js/product-detail.js') }}"></script>
@endpush 