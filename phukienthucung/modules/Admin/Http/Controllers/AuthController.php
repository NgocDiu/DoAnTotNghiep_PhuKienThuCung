<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin::auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.index');
        }

        return redirect()->back()->withErrors(['email' => 'Tài khoản hoặc mật khẩu không đúng!']);
    }

    public function showRegistrationForm()
    {
        return view('admin::auth.register');
    }

   public function register(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Mật khẩu phải trùng khớp
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Đăng nhập người dùng ngay sau khi đăng ký
        Auth::guard('admin')->login($user);

        // Chuyển hướng đến trang chủ (hoặc trang bạn muốn sau khi đăng ký)
        return redirect()->route('admin.index');
    }

        public function logout(Request $request)
        {
            Auth::guard('admin')->logout(); // Đăng xuất đúng guard admin

            $request->session()->invalidate(); // Xóa toàn bộ session
            $request->session()->regenerateToken(); // Tạo token mới cho bảo mật

            return redirect()->route('admin.login'); // Chuyển về trang login
}


}
