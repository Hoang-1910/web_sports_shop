{{-- filepath: c:\xampp\htdocs\web_sports_shop\resources\views\customer\profile_edit.blade.php --}}
@extends('customer.layouts.app')

@section('title', 'Chỉnh sửa thông tin cá nhân')

@section('content')
<nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('customer.profile') }}">Tài khoản cá nhân</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
        </ol>
    </div>
</nav>

<section class="profile-edit-section py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm rounded-4 p-4">
                    <h3 class="fw-bold mb-4">Chỉnh sửa thông tin cá nhân</h3>
                    <form action="{{ route('customer.profile.update') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}">
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}" required>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address', $customer->address) }}">
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('customer.profile') }}" class="btn btn-secondary">Quay lại</a>
                            <button type="submit" class="btn btn-danger px-4">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection