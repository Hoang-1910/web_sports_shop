@extends('admin.layouts.app')

@section('title', 'Chi tiết người dùng')

@section('content')
<style>
    .user-detail-container {
        max-width: 600px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 14px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .user-detail-container h2 {
        font-size: 24px;
        color: #5e2ced;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-info-group {
        margin-bottom: 20px;
    }

    .user-info-group label {
        font-weight: 600;
        color: #555;
        display: block;
        margin-bottom: 6px;
    }

    .user-info-group p {
        font-size: 16px;
        color: #333;
    }

    .user-avatar {
        width: 128px;
        height: 128px;
        border-radius: 50%;
        border: 3px solid #eee;
        object-fit: cover;
        margin-top: 8px;
    }

    .back-button {
        display: inline-block;
        margin-top: 30px;
        padding: 10px 20px;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.2s;
    }

    .back-button:hover {
        background-color: #e0e0e0;
    }

    @media (max-width: 600px) {
        .user-detail-container {
            padding: 20px;
        }

        .user-detail-container h2 {
            font-size: 20px;
        }
    }
</style>

<div class="user-detail-container">
    <h2>👤 Thông tin người dùng</h2>

    <div class="user-info-group">
        <label>Họ tên:</label>
        <p>{{ $user->name }}</p>
    </div>

    <div class="user-info-group">
        <label>Email:</label>
        <p>{{ $user->email }}</p>
    </div>

    <div class="user-info-group">
        <label>Số điện thoại:</label>
        <p>{{ $user->phone ?? 'Chưa cập nhật' }}</p>
    </div>

    <div class="user-info-group">
        <label>Vai trò:</label>
        <p>{{ $user->role === 'admin' ? 'Quản trị viên' : 'Khách hàng' }}</p>
    </div>

    <div class="user-info-group">
        <label>Ngày tạo:</label>
        <p>{{ $user->created_at->format('d/m/Y H:i') }}</p>
    </div>

    @if ($user->image)
    <div class="user-info-group">
        <label>Ảnh đại diện:</label>
        <img src="{{ asset('storage/' . $user->image) }}" alt="Avatar" class="user-avatar">
    </div>
    @endif

    <a href="{{ route('admin.users.index') }}" class="back-button">← Quay lại danh sách</a>
</div>
@endsection
