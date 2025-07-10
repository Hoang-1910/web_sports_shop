@extends('customer.layouts.app')

@section('title', 'Sản phẩm theo thương hiệu')

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('customer.home') }}" class="text-decoration-none">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tất cả thương hiệu</li>
            </ol>
        </div>
    </nav>

    <!-- Hiển thị sản phẩm theo từng brand -->
    <div class="container">
        @foreach($brand as $brand)
            <section class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h5 mb-0">{{ $brand->name }}</h2>
                    <a href="{{ route('customer.products.byBrand', $brand->id) }}" class="btn btn-sm btn-outline-primary">
                        Xem tất cả
                    </a>
                </div>

                @if($brand->products->isEmpty())
                    <p class="text-muted">Không có sản phẩm nào thuộc thương hiệu này.</p>
                @else
                    <div class="row g-4">
                        @foreach($brand->products->take(4) as $product) {{-- Hiển thị tối đa 4 sản phẩm mỗi brand --}}
                            <div class="col-md-3 col-6">
                                <div class="card h-100 shadow-sm border-0">
                                    <a href="{{ route('customer.products.show', $product->id) }}">
                                        <img src="{{ asset('storage/' . $product['image']) }}"
                                            class="card-img-top object-fit-cover"
                                            alt="{{ $product->name }}"
                                            style="aspect-ratio:1/1">
                                    </a>
                                    <div class="card-body p-2">
                                        <h6 class="card-title mb-1">
                                            <a href="{{ route('customer.products.show', $product->id) }}"
                                               class="text-decoration-none text-dark">
                                                {{ Str::limit($product->name, 50) }}
                                            </a>
                                        </h6>
                                        <p class="mb-0 text-danger fw-semibold">
                                            {{ number_format($product->price) }}đ
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        @endforeach
    </div>
@endsection
