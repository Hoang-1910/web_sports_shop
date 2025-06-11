@extends('customer.layouts.app')

@section('title', 'Tài khoản cá nhân')

@section('content')
<nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tài khoản cá nhân</li>
        </ol>
    </div>
</nav>

<section class="profile-section py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm rounded-4 p-4">
                    <div class="d-flex flex-column flex-md-row align-items-center gap-4 mb-4">
                        <div class="profile-avatar position-relative">
                            <img src="{{ asset('customer/images/avatar.jpg') }}" alt="Avatar" class="rounded-circle border border-3 border-white shadow" width="100" height="100">
                        </div>
                        <div class="flex-grow-1">
                            <h2 class="fw-bold mb-1">{{ $customer->name }}</h2>
                            <p class="mb-1 text-muted"><i class="bi bi-envelope me-2"></i>{{ $customer->email }}</p>
                            <p class="mb-1 text-muted"><i class="bi bi-telephone me-2"></i>{{ $customer->phone ?? 'Chưa cập nhật' }}</p>
                            <p class="mb-0 text-muted"><i class="bi bi-geo-alt me-2"></i>{{ $customer->address ?? 'Chưa cập nhật' }}</p>
                        </div>
                        <div class="ms-md-auto">
                            <a href="{{ route('customer.profile.edit') }}" class="btn btn-outline-danger px-4"><i class="bi bi-pencil me-2"></i>Chỉnh sửa</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label text-muted">Họ và tên</label>
                            <div class="fw-semibold">{{ $customer->name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label text-muted">Email</label>
                            <div class="fw-semibold">{{ $customer->email }}</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label text-muted">Số điện thoại</label>
                            <div class="fw-semibold">{{ $customer->phone ?? 'Chưa cập nhật' }}</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label text-muted">Địa chỉ</label>
                            <div class="fw-semibold">{{ $customer->address ?? 'Chưa cập nhật' }}</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-muted">Ngày tham gia</label>
                            <div class="fw-semibold">{{ $customer->created_at ? $customer->created_at->format('d/m/Y') : '' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('customer/css/profile.css') }}" rel="stylesheet">
@endpush