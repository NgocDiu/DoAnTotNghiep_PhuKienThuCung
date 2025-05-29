<?php
namespace Modules\Publish\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('publish::auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Sử dụng guard 'publish' để đăng nhập
        if (Auth::guard('publish')->attempt($credentials)) {
            return redirect()->route('publish.index'); // Chuyển đến trang chủ sau khi đăng nhập
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        return view('publish::auth.register');
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
            'group' => 'customer',
        ]);

        

        // Chuyển hướng đến trang chủ (hoặc trang bạn muốn sau khi đăng ký)
        return redirect()->route('publish.login')->with('success', 'Đăng ký thành công!');
    }
    public function logout(Request $request)
    {
        Auth::guard('publish')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('publish.login');
    }

}
