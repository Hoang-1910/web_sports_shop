@extends('customer.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <!-- Logo Section -->
                    <div class="text-center mb-4">
                        <div class="logo-container d-inline-flex align-items-center justify-content-center mb-3">
                            <div class="logo-placeholder bg-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="fas fa-user text-white fs-3"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-1">Đăng nhập</h3>
                        <p class="text-muted mb-0">Chào mừng bạn quay trở lại!</p>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('customer.login.submit') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-medium">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input type="email" name="email" class="form-control border-start-0" 
                                       value="{{ old('email') }}" required
                                       placeholder="Nhập email của bạn">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium">Mật khẩu</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password" name="password" class="form-control border-start-0" 
                                       required placeholder="Nhập mật khẩu">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label text-muted" for="remember">Ghi nhớ đăng nhập</label>
                            </div>
                            <a href="#" class="text-danger text-decoration-none small">Quên mật khẩu?</a>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Đăng nhập
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted mb-0">Chưa có tài khoản? 
                            <a href="{{ route('customer.register') }}" class="text-danger text-decoration-none fw-medium">
                                Đăng ký ngay
                            </a>
                        </p>
                    </div>

                    <!-- Social Login -->
                    <div class="mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <hr class="flex-grow-1">
                            <span class="text-muted px-3 small">Hoặc đăng nhập với</span>
                            <hr class="flex-grow-1">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-danger">
                                <i class="fab fa-google me-2"></i>Google
                            </button>
                            <button type="button" class="btn btn-outline-danger">
                                <i class="fab fa-facebook-f me-2"></i>Facebook
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link href="{{ asset('customer/css/login.css') }}" rel="stylesheet">
@endpush
@endsection
