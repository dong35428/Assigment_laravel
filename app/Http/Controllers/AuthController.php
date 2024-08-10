<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function registerPost(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
        $user = User::create($data);

        Auth::login($user);

        request()->session()->regenerate();

        return redirect()->route('index')
            ->with('success', 'Đăng ký thành công!');
    }

    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        $data = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        //sử dụng php docs
        // /**
        //  * @var User $user
        //  */

        // $user = Auth::user();
        if (Auth::attempt($data)) {
            request()->session()->regenerate();
            if (Auth::user()->type == 'admin') {
                return redirect()->route('admin.index');
            }
            return redirect()->route('index')
                ->with('success', 'Đăng nhập thành công!');
        } else {
            return back()->with(['success' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')
            ->with('success', 'Đăng xuất thành công!');
    }
    public function forgot()
    {
        return view('forgot');
    }
    public function forgotPassword(Request $request)
    {
    }
}
