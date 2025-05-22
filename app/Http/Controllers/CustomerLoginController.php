<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(array_merge($data, ['role' => 'customer']))) {
            return redirect('/');
        }

        return back()->withErrors(['email' => 'Sai thông tin đăng nhập']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    //test layout
    public function testLayout() {
        return view('customer.home');
    }
}
