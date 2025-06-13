<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống POS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            position: relative;
            z-index: 1;
        }

        /* Ảnh nền toàn trang */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: url("{{ asset('customer/images/bg-login.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            z-index: -1;
            opacity: 0.4; /* làm mờ nền */
        }

        .login-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            display: flex;
            overflow: hidden;
        }

        .login-image {
            width: 50%;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-image img {
            width: 100%;
            max-width: 300px;
        }

        .login-form {
            padding: 40px;
            width: 50%;
        }

        .form-control {
            border-radius: 10px;
        }

        .input-group-text {
            background-color: #fff;
            border-right: none;
        }

        .input-group .form-control {
            border-left: none;
        }

        .btn-login {
            background-color: #facc15;
            color: #000;
            font-weight: 600;
            border-radius: 10px;
        }

        .btn-login:hover {
            background-color: #eab308;
        }

        .footer-note {
            font-size: 14px;
            text-align: center;
            margin-top: 30px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="login-container">

        <div class="login-image">
            <img src="{{ asset('customer/images/team.jpg') }}" alt="Login illustration">
        </div>

        <div class="login-form">
            <h4 class="mb-4 fw-bold text-center">ĐĂNG NHẬP HỆ THỐNG POS</h4>

            @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Tài khoản quản trị</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Nhập email" required autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-key"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-login">Đăng nhập</button>
                </div>
            </form>

            <div class="footer-note">
                Phần mềm quản lý bán hàng 
            </div>
        </div>
    </div>
</body>
</html>
