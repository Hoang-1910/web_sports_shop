@extends('customer.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="logo-placeholder bg-danger rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-shield-alt text-white fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-1">Xác nhận mã OTP</h3>
                        <p class="text-muted mb-0">Nhập mã xác nhận và đặt mật khẩu mới</p>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('customer.password.verifyOtp') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-4">
                            <label class="form-label fw-medium">Mã xác nhận (OTP)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-code text-muted"></i>
                                </span>
                                <input type="text" name="otp" class="form-control border-start-0"
                                       required maxlength="6" placeholder="Nhập mã 6 chữ số">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium">Mật khẩu mới</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password" name="password" class="form-control border-start-0" 
                                       required placeholder="Nhập mật khẩu mới">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium">Xác nhận mật khẩu mới</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password" name="password_confirmation" class="form-control border-start-0"
                                       required placeholder="Nhập lại mật khẩu mới">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="fas fa-check-circle me-2"></i>Xác nhận
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <a href="{{ route('customer.login') }}" class="text-danger text-decoration-none small">
                            <i class="fas fa-arrow-left me-1"></i>Quay lại đăng nhập
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
