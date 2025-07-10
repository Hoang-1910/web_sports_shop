<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CustomerPasswordController extends Controller
{
    // form nhập email
    public function showRequestForm()
    {
        return view('customer.passwords.email');
    }

    // gửi OTP
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->where('role', 'customer')->first();
        if (!$user) {
            return back()->with('error', 'Email không tồn tại trong hệ thống.');
        }

        $otp = rand(100000, 999999);

        // lưu otp vào session (hoặc có thể DB nếu cần)
        session([
            'password_reset_email' => $request->email,
            'password_reset_otp' => $otp,
            'password_reset_expires' => now()->addMinutes(5)
        ]);

        // gửi mail
        Mail::raw("Mã OTP đặt lại mật khẩu của bạn là: {$otp}", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Mã OTP đặt lại mật khẩu');
        });

        return redirect()->route('customer.password.verifyForm')
            ->with('success', 'Đã gửi mã OTP, vui lòng kiểm tra email.');
    }

    // form nhập otp
    public function showVerifyForm()
    {
        $email = session('password_reset_email');
        if (!$email) {
            return redirect()->route('customer.password.request')->with('error', 'Vui lòng nhập email trước.');
        }
        return view('customer.passwords.otp', compact('email'));
    }

    // xác thực otp và đổi mật khẩu
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
            'password' => 'required|min:6|confirmed'
        ]);

        $sessionOtp = session('password_reset_otp');
        $sessionEmail = session('password_reset_email');
        $sessionExpires = session('password_reset_expires');

        if (!$sessionOtp || !$sessionEmail) {
            return redirect()->route('customer.password.request')->with('error', 'Vui lòng gửi lại yêu cầu.');
        }

        if (now()->gt($sessionExpires)) {
            return redirect()->route('customer.password.request')->with('error', 'Mã OTP đã hết hạn.');
        }

        if ($request->otp != $sessionOtp) {
            return back()->with('error', 'Mã OTP không đúng.');
        }

        $user = User::where('email', $sessionEmail)->where('role', 'customer')->first();
        if (!$user) {
            return redirect()->route('customer.password.request')->with('error', 'Tài khoản không tồn tại.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // xoá session
        session()->forget(['password_reset_email', 'password_reset_otp', 'password_reset_expires']);

        return redirect()->route('customer.login')->with('success', 'Đổi mật khẩu thành công. Vui lòng đăng nhập lại.');
    }
}
