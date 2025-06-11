@extends('customer.layouts.app')

@section('title', 'Thương hiệu - ' . ucfirst($slug))

@section('content')
<!-- Hero Banner -->
<section class="brand-hero position-relative py-5" style="background: linear-gradient(135deg, #e53935 0%, #c62828 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-white">
                <h1 class="display-4 fw-bold mb-3">{{ ucfirst($slug) }}</h1>
                <p class="lead mb-4">Khám phá các sản phẩm chất lượng từ thương hiệu {{ ucfirst($slug) }}!</p>
            </div>
        </div>
    </div>
</section>

<!-- Brand Products -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-4 text-danger">Bộ lọc</h5>
                        
                        <!-- Price Range -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Khoảng giá</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="price1">
                                <label class="form-check-label" for="price1">Dưới 500.000đ</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="price2">
                                <label class="form-check-label" for="price2">500.000đ - 1.000.000đ</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="price3">
                                <label class="form-check-label" for="price3">1.000.000đ - 2.000.000đ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="price4">
                                <label class="form-check-label" for="price4">Trên 2.000.000đ</label>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Danh mục</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="cat1">
                                <label class="form-check-label" for="cat1">Giày thể thao</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="cat2">
                                <label class="form-check-label" for="cat2">Quần áo thể thao</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="cat3">
                                <label class="form-check-label" for="cat3">Phụ kiện</label>
                            </div>
                        </div>

                        <!-- Size -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Kích thước</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-outline-danger btn-sm">36</button>
                                <button class="btn btn-outline-danger btn-sm">37</button>
                                <button class="btn btn-outline-danger btn-sm">38</button>
                                <button class="btn btn-outline-danger btn-sm">39</button>
                                <button class="btn btn-outline-danger btn-sm">40</button>
                                <button class="btn btn-outline-danger btn-sm">41</button>
                                <button class="btn btn-outline-danger btn-sm">42</button>
                                <button class="btn btn-outline-danger btn-sm">43</button>
                            </div>
                        </div>

                        <!-- Color -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Màu sắc</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-outline-dark btn-sm" style="width: 30px; height: 30px; padding: 0;"></button>
                                <button class="btn btn-outline-danger btn-sm" style="width: 30px; height: 30px; padding: 0;"></button>
                                <button class="btn btn-outline-warning btn-sm" style="width: 30px; height: 30px; padding: 0;"></button>
                                <button class="btn btn-outline-success btn-sm" style="width: 30px; height: 30px; padding: 0;"></button>
                                <button class="btn btn-outline-info btn-sm" style="width: 30px; height: 30px; padding: 0;"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-9">
                <!-- Sort and Filter -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <span class="me-2">Sắp xếp theo:</span>
                        <select class="form-select form-select-sm" style="width: auto;">
                            <option>Mới nhất</option>
                            <option>Giá tăng dần</option>
                            <option>Giá giảm dần</option>
                            <option>Bán chạy nhất</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="me-2">Hiển thị:</span>
                        <select class="form-select form-select-sm" style="width: auto;">
                            <option>12 sản phẩm</option>
                            <option>24 sản phẩm</option>
                            <option>36 sản phẩm</option>
                        </select>
                    </div>
                </div>

                <!-- Products -->
                <div class="row g-4">
                    @php
                    $products = [
                        [
                            'name' => 'Giày thể thao ' . ucfirst($slug),
                            'price' => '1.500.000đ',
                            'image' => asset('customer/images/product1.jpg'),
                            'discount' => '20%'
                        ],
                        [
                            'name' => 'Áo thể thao ' . ucfirst($slug),
                            'price' => '800.000đ',
                            'image' => asset('customer/images/product2.jpg'),
                            'discount' => '15%'
                        ],
                        [
                            'name' => 'Quần thể thao ' . ucfirst($slug),
                            'price' => '600.000đ',
                            'image' => asset('customer/images/product3.jpg'),
                            'discount' => null
                        ],
                        [
                            'name' => 'Phụ kiện ' . ucfirst($slug),
                            'price' => '300.000đ',
                            'image' => asset('customer/images/product2.jpg'),
                            'discount' => '10%'
                        ]
                    ];
                    @endphp

                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card bg-white rounded-4 overflow-hidden shadow-sm h-100">
                            <div class="position-relative">
                                <img src="{{ $product['image'] }}" class="w-100" style="height: 250px; object-fit: cover;" alt="{{ $product['name'] }}">
                                @if($product['discount'])
                                <span class="position-absolute top-0 end-0 m-2 badge bg-danger">{{ $product['discount'] }}</span>
                                @endif
                                <button class="btn btn-light btn-sm position-absolute bottom-0 end-0 m-2 rounded-circle">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="p-3">
                                <h5 class="product-title mb-2">{{ $product['name'] }}</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-danger fw-bold">{{ $product['price'] }}</span>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-cart-plus me-1"></i>Thêm vào giỏ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <nav class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Trước</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link bg-danger border-danger" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link text-danger" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link text-danger" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link text-danger" href="#">Sau</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('customer/css/brands-detail.css') }}">
@endpush 