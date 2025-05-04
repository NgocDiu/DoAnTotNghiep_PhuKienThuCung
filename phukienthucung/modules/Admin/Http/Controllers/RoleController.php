<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->orderBy('name')->paginate(20);
        $permissions = Permission::orderBy('name')->get();
        return view('admin::roles.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array',
        ]);

        $role = Role::create(['name' => $request->name]);
        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->back()->with('success', 'Tạo vai trò thành công');
    }

public function update(Request $request, Role $role)
{
    $request->validate([
        'name' => 'required|unique:roles,name,' . $role->id,
        'permissions' => 'array',
    ]);

    $role->update(['name' => $request->name]);

    if (!empty($request->permissions)) {
        // Lấy danh sách permission tồn tại
        $validPermissions = Permission::whereIn('name', $request->permissions)->pluck('name')->toArray();
        $role->syncPermissions($validPermissions);
    } else {
        $role->syncPermissions([]);
    }

    return redirect()->back()->with('success', 'Cập nhật vai trò thành công');
}


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', 'Xóa vai trò thành công');
    }
}
