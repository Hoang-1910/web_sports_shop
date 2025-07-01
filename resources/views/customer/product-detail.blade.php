@extends('customer.layouts.app')

@section('title', $product->name)

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('customer.home') }}" class="text-decoration-none">Trang chủ</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('customer.products.index') }}" class="text-decoration-none">Sản
                        phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
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
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-3"
                                alt="{{ $product->name }}" id="mainProductImage">
                        </div>

                        <!-- Thumbnail Images -->
                        <div class="thumbnail-images d-flex gap-2 flex-wrap">
                            <!-- Ảnh đại diện chính -->
                            <div class="thumbnail active" data-image="{{ asset('storage/' . $product->image) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-2"
                                    alt="Thumbnail">
                            </div>
                            <!-- Ảnh riêng từng variant (biến thể) -->
                            @foreach ($product->variants as $variant)
                                @foreach ($variant->images as $vimg)
                                    <div class="thumbnail" data-image="{{ asset('storage/' . $vimg->image_path) }}">
                                        <img src="{{ asset('storage/' . $vimg->image_path) }}" class="img-fluid rounded-2"
                                            alt="Ảnh biến thể">
                                        @if ($variant->size || $variant->color)
                                            <small class="d-block text-center text-muted" style="font-size:11px;">
                                                {{ $variant->size ? 'Size: ' . $variant->size : '' }}
                                                {{ $variant->color ? ' - Màu: ' . $variant->color : '' }}
                                            </small>
                                        @endif
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6">
                    <div class="product-info bg-white rounded-4 shadow-sm p-4">
                        <h1 class="h2 fw-bold mb-3">{{ $product->name }}</h1>

                        <!-- Price -->
                        <div class="price-info mb-4">
                            <div class="d-flex align-items-center gap-3">
                                <span class="h3 text-danger fw-bold mb-0">
                                    {{ number_format($product->price) }}đ
                                </span>
                                @if ($product->original_price && $product->original_price > $product->price)
                                    <span class="text-muted text-decoration-line-through">
                                        {{ number_format($product->original_price) }}đ
                                    </span>
                                    <span class="badge bg-danger">
                                        -{{ round(100 - ($product->price / $product->original_price) * 100) }}%
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="description mb-4">
                            <p class="text-muted mb-0">{{ $product->description }}</p>
                        </div>

                        <!-- Variants -->
                        @if ($product->variants && $product->variants->count() > 0)
                            <div class="variants mb-4">
                                <!-- Size Selection -->
                                <div class="size-selection mb-3">
                                    <label class="form-label fw-medium">Kích thước</label>
                                    <div class="d-flex flex-wrap gap-2" id="sizeOptions">
                                        @php
                                            $sizes = $product->variants->pluck('size')->unique();
                                        @endphp
                                        @foreach ($sizes as $size)
                                            <button type="button" class="btn btn-outline-secondary size-btn"
                                                data-size="{{ $size }}">
                                                {{ $size }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Color Selection -->
                                <div class="color-selection mb-3">
                                    <label class="form-label fw-medium">Màu sắc</label>
                                    <div class="d-flex flex-wrap gap-2" id="colorOptions">
                                        @php
                                            $colors = $product->variants->pluck('color')->unique();
                                        @endphp
                                        @foreach ($colors as $color)
                                            <button type="button" class="btn btn-outline-secondary color-btn"
                                                data-color="{{ $color }}">
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
                                <input type="number" class="form-control text-center" id="quantity" name="quantity"
                                    value="1" min="1">
                                <button class="btn btn-outline-secondary" type="button" id="increaseQuantity">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <form action="{{ route('customer.cart.add') }}" method="POST" id="addToCartForm">
                            @csrf
                            <input type="hidden" name="product_variant_id" id="variantInput" value="">
                            <input type="hidden" name="buy_now" id="buyNowInput" value="0">
                            <button type="submit" class="btn btn-danger btn-lg" id="addToCart" disabled>
                                <i class="fas fa-shopping-cart me-2"></i>Thêm vào giỏ
                            </button>
                            <button type="submit" class="btn btn-warning btn-lg ms-2" id="buyNowBtn" disabled>
                                <i class="fas fa-bolt me-2"></i>Mua ngay
                            </button>
                        </form>

                        <!-- Product Meta -->
                        <div class="product-meta mt-4 pt-4 border-top">
                            <div class="d-flex flex-wrap gap-4">
                                <div class="meta-item">
                                    <span class="text-muted">Thương hiệu:</span>
                                    <span class="fw-medium">{{ $product->brand }}</span>
                                </div>
                                <div class="meta-item">
                                    <span class="text-muted">Danh mục:</span>
                                    <span class="fw-medium">{{ $product->category->name ?? '' }}</span>
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
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab">
                                    Mô tả
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                    type="button" role="tab">
                                    Đánh giá
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content p-4" id="productTabsContent">
                            <!-- Description Tab -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                <div class="product-description">
                                    {!! $product->description !!}
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
                                                    $avgRating = $product->reviews->avg('rating');
                                                    $totalReviews = $product->reviews->count();
                                                @endphp
                                                <h3 class="display-4 fw-bold mb-0">{{ number_format($avgRating, 1) }}</h3>
                                                <div class="stars text-warning mb-2">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= floor($avgRating))
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
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        @php
                                                            $count = $product->reviews->where('rating', $i)->count();
                                                            $percentage =
                                                                $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                                                        @endphp
                                                        <div class="rating-bar d-flex align-items-center mb-2">
                                                            <span class="text-muted me-2">{{ $i }} sao</span>
                                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                                <div class="progress-bar bg-warning"
                                                                    style="width: {{ $percentage }}%"></div>
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
                                        @forelse($product->reviews as $review)
                                            <div class="review-item border-bottom pb-4 mb-4">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <div>
                                                        <h6 class="fw-bold mb-1">{{ $review->user->name ?? 'Khách' }}</h6>
                                                        <div class="stars text-warning mb-2">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <i
                                                                    class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <small
                                                        class="text-muted">{{ $review->created_at->format('d/m/Y') }}</small>
                                                </div>
                                                <p class="mb-0">{{ $review->comment }}</p>
                                            </div>
                                        @empty
                                            <div class="text-center py-4">
                                                <p class="text-muted mb-0">Chưa có đánh giá nào cho sản phẩm này.</p>
                                            </div>
                                        @endforelse
                                    </div>

                                    <!-- Review Submission Form -->
                                    @auth
                                        <div class="review-form mt-4 pt-4 border-top">
                                            <h5 class="fw-bold mb-3">Gửi đánh giá của bạn</h5>
                                            <form action="{{ route('customer.reviews.store', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="rating" class="form-label">Đánh giá sao:</label>
                                                    <div id="rating" class="stars-input text-warning d-flex gap-1">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="far fa-star" data-rating="{{ $i }}"></i>
                                                        @endfor
                                                        <input type="hidden" name="rating" id="selectedRating"
                                                            value="0">
                                                    </div>
                                                    @error('rating')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="comment" class="form-label">Bình luận:</label>
                                                    <textarea class="form-control" id="comment" name="comment" rows="4" required>{{ old('comment') }}</textarea>
                                                    @error('comment')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-danger">Gửi đánh giá</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="mt-4 pt-4 border-top text-center">
                                            <p class="text-muted mb-0">Vui lòng <a href="{{ route('customer.login') }}"
                                                    class="text-danger text-decoration-none">đăng nhập</a> để gửi đánh giá.</p>
                                        </div>
                                    @endauth
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainProductImage');
            const thumbnails = document.querySelectorAll('.thumbnail');

            // Tạo mảng các src của thumbnail
            const imageList = Array.from(thumbnails).map(t => t.getAttribute('data-image'));
            let currentIndex = 0;
            let timer = null;

            // Hàm đổi ảnh chính
            function setMainImage(index) {
                mainImage.src = imageList[index];
                thumbnails.forEach(t => t.classList.remove('active'));
                thumbnails[index].classList.add('active');
                currentIndex = index;
            }

            // Slideshow tự động
            function startSlideshow() {
                timer = setInterval(function() {
                    let next = (currentIndex + 1) % imageList.length;
                    setMainImage(next);
                }, 3000);
            }

            // Khi click vào thumbnail
            thumbnails.forEach((thumbnail, idx) => {
                thumbnail.addEventListener('click', function() {
                    setMainImage(idx);
                    // Reset timer khi user click
                    clearInterval(timer);
                    startSlideshow();
                });
            });

            // Khởi động slideshow
            setMainImage(0);
            startSlideshow();
        });
        const variants = @json($variantArray);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sizeButtons = document.querySelectorAll('.size-btn');
            const colorButtons = document.querySelectorAll('.color-btn');
            let selectedSize = null;
            let selectedColor = null;
            let selectedVariantId = null;

            const buyNowBtn = document.getElementById('buyNowBtn');
            const addToCartBtn = document.getElementById('addToCart');
            const buyNowInput = document.getElementById('buyNowInput');

            // Enable/disable "Mua ngay" giống "Thêm vào giỏ"
            function updateDisabledStates() {
                // Disable color nếu size được chọn và cặp (size, color) không tồn tại
                if (selectedSize) {
                    colorButtons.forEach(button => {
                        const color = button.getAttribute('data-color');
                        const exists = variants.some(v => v.size === selectedSize && v.color === color);
                        button.disabled = !exists;
                    });
                } else {
                    colorButtons.forEach(button => button.disabled = false);
                }

                // Disable size nếu color được chọn và cặp (size, color) không tồn tại
                if (selectedColor) {
                    sizeButtons.forEach(button => {
                        const size = button.getAttribute('data-size');
                        const exists = variants.some(v => v.color === selectedColor && v.size === size);
                        button.disabled = !exists;
                    });
                } else {
                    sizeButtons.forEach(button => button.disabled = false);
                }

                // Sau khi cập nhật, kiểm tra có variant hợp lệ không
                const variantInput = document.getElementById('variantInput');
                selectedVariantId = null;
                if (selectedSize && selectedColor) {
                    const found = variants.find(v => v.size === selectedSize && v.color === selectedColor);
                    if (found) {
                        selectedVariantId = found.id;
                        addToCartBtn.disabled = false;
                        buyNowBtn.disabled = false;
                        variantInput.value = found.id;
                        buyNowInput.value = 1; // Mặc định là mua ngay 1 sản phẩm
                        return;
                    }
                }
                addToCartBtn.disabled = true;
                buyNowBtn.disabled = true;
                variantInput.value = '';
                buyNowInput.value = 0;
            }

            sizeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    sizeButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    selectedSize = this.getAttribute('data-size');
                    updateDisabledStates();
                });
            });

            colorButtons.forEach(button => {
                button.addEventListener('click', function() {
                    colorButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    selectedColor = this.getAttribute('data-color');
                    updateDisabledStates();
                });
            });

            // Xử lý submit cho "Mua ngay"
            buyNowBtn.addEventListener('click', function() {
                buyNowInput.value = 1;
            });
            addToCartBtn.addEventListener('click', function() {
                buyNowInput.value = 0;
            });

            document.getElementById('addToCartForm').addEventListener('submit', function(e) {
                if (!selectedVariantId) {
                    e.preventDefault();
                    alert('Vui lòng chọn đủ kích thước và màu sắc!');
                } else {
                    document.getElementById('variantInput').value = selectedVariantId;
                }
            });

            // Star rating functionality
            const stars = document.querySelectorAll('.stars-input .fa-star');
            const selectedRatingInput = document.getElementById('selectedRating');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-rating');
                    selectedRatingInput.value = rating;
                    highlightStars(rating);
                });

                star.addEventListener('mouseover', function() {
                    const rating = this.getAttribute('data-rating');
                    highlightStars(rating);
                });

                star.addEventListener('mouseout', function() {
                    highlightStars(selectedRatingInput.value);
                });
            });

            function highlightStars(rating) {
                stars.forEach(star => {
                    if (star.getAttribute('data-rating') <= rating) {
                        star.classList.remove('far');
                        star.classList.add('fas');
                    } else {
                        star.classList.remove('fas');
                        star.classList.add('far');
                    }
                });
            }

            // Initial highlight based on old input value if available
            if (selectedRatingInput.value > 0) {
                highlightStars(selectedRatingInput.value);
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Xử lý tăng/giảm số lượng
            const decreaseBtn = document.getElementById('decreaseQuantity');
            const increaseBtn = document.getElementById('increaseQuantity');
            const quantityInput = document.getElementById('quantity');

            if (decreaseBtn && increaseBtn && quantityInput) {
                decreaseBtn.addEventListener('click', function() {
                    let value = parseInt(quantityInput.value, 10);
                    if (value > 1) {
                        quantityInput.value = value - 1;
                    }
                });

                increaseBtn.addEventListener('click', function() {
                    let value = parseInt(quantityInput.value, 10);
                    quantityInput.value = value + 1;
                });
            }
        });
    </script>
@endpush
