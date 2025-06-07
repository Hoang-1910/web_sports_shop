<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerRegisterController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('customer.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // yêu cầu có trường password_confirmation
        ], [
            'email.unique' => 'Email này đã được sử dụng.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        // Tạo user mới
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'customer', // hoặc 'user' tuỳ theo project bạn định nghĩa
        ]);

        // Tự động đăng nhập sau khi đăng ký (tuỳ chọn)
        Auth::login($user);

        // Chuyển hướng tới trang chủ khách hàng hoặc trang bất kỳ
        return redirect()->route('customer.home')->with('success', 'Đăng ký thành công!');
    }
}
