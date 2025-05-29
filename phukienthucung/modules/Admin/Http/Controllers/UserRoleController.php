<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User; // Model user
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->where('group', 'employee')->get();
        $roles = Role::all();
        return view('admin::users.roles', compact('users', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'array'
        ]);

        $user->syncRoles($request->roles);

        return redirect()->back()->with('success', 'Cập nhật vai trò cho người dùng thành công');
    }
}
