@extends('customer.layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="hero-bg-section position-relative w-100">
    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="hero-section d-flex flex-column align-items-center justify-content-center text-center position-relative" style="z-index:2; min-height: 500px;">
        <h1 class="hero-title mb-3">Be Faster – Be Stronger – Be You</h1>
        <p class="hero-subtitle mb-4">Khám phá bộ sưu tập mới nhất với công nghệ tiên tiến cho hiệu suất tối đa</p>
        <div class="d-flex flex-row justify-content-center gap-3">
            <a href="#" class="btn btn-danger btn-lg px-5">Mua ngay</a>
            <a href="#" class="btn btn-light btn-lg px-5 border">Xem bộ sưu tập</a>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('customer/css/hero.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('customer/js/hero.js') }}"></script>
@endpush
