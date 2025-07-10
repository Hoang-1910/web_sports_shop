@extends('customer.layouts.app')

@section('title', 'Thương hiệu: ' . $brand->name)

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('customer.home') }}" class="text-decoration-none">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Thương hiệu: {{ $brand->name }}
                </li>
            </ol>
        </div>
    </nav>

    <!-- Products -->
    <section class="py-4">
        <div class="container">
            <h2 class="h4 mb-4">Sản phẩm thuộc thương hiệu: {{ $brand->name }}</h2>

            @if($products->count())
                <div class="row g-4">
                    @foreach($products as $product)
                        <div class="col-md-4 col-6">
                            <div class="card h-100 shadow-sm border-0">
                                <a href="{{ route('customer.products.show', $product->id) }}">
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                        class="card-img-top object-fit-cover"
                                        style="aspect-ratio:1/1"
                                        alt="{{ $product->name }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title fs-6">
                                        <a href="{{ route('customer.products.show', $product->id) }}"
                                            class="text-decoration-none text-dark">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
                                    <div class="text-danger fw-bold mb-1">
                                        {{ number_format($product->getDiscountedPrice()) }}đ
                                    </div>
                                    @if ($product->getDiscountedPrice() < $product->price)
                                        <div class="text-muted small text-decoration-line-through">
                                            {{ number_format($product->price) }}đ
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <nav class="mt-4">
                    {{ $products->links() }}
                </nav>
            @else
                <div class="alert alert-warning">
                    Không có sản phẩm nào thuộc thương hiệu này.
                </div>
            @endif
        </div>
    </section>
@endsection
