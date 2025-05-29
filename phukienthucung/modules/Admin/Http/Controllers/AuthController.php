<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin::auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Thêm check is_active = true nếu cần
        if (Auth::guard('admin')->attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'is_active' => true])) {
            return redirect()->route('admin.index');
        }

        return back()->withErrors(['email' => 'Sai thông tin đăng nhập hoặc tài khoản đã bị khóa.']);
    }

    public function showRegistrationForm()
    {
        return view('admin::auth.register');
    }

    public function register(Request $request)
{
    $data = $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|string|confirmed|min:6',
    ]);

    $user = User::create([
        'name'      => $data['name'],
        'email'     => $data['email'],
        'group'     => 'employee',
        'password'  => Hash::make($data['password']),
        'is_active' => true,
    ]);
    $user->employee()->create();


    // Không login ngay, mà chuyển về trang đăng nhập
    return redirect()->route('admin.login')->with('success', 'Đăng ký thành công.');
}


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function editProfile()
    {
        return view('admin::auth.profile', ['user' => Auth::guard('admin')->user()]);
    }

    public function updateProfile(Request $request)
{
    $user = Auth::guard('admin')->user();

    $data = $request->validate([
        'name'       => 'required|string|max:255',
        'email'      => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        'phone'      => 'nullable|string|max:20',
        'password'   => 'nullable|string|confirmed|min:6',

        // Thông tin employee (không bắt buộc)
        'birth_date' => 'nullable|date',
        'gender'     => 'nullable|in:Nam,Nữ,Khác',
        'cccd'       => 'nullable|string|max:20',
    ]);

    // Cập nhật user
    $user->name  = $data['name'];
    $user->email = $data['email'];
    $user->phone = $data['phone'] ?? null;

    if (!empty($data['password'])) {
        $user->password = Hash::make($data['password']);
    }
    $user->save();

    // Nếu có employee thì cập nhật
    if ($user->employee) {
        $user->employee->update([
            'birth_date' => $data['birth_date'] ?? null,
            'gender'     => $data['gender'] ?? null,
            'cccd'       => $data['cccd'] ?? null,
        ]);
    }

    return back()->with('success', 'Cập nhật thông tin thành công');
}
}
