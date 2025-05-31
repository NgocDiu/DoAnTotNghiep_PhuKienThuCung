<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('group', 'employee')->with('employee');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%")
                  ->orWhere('email', 'like', "%$keyword%")
                  ->orWhere('phone', 'like', "%$keyword%");
            });
        }

        $employees = $query->latest()->get();

        return view('admin::employees.index', compact('employees'));
    }

    public function show($id)
    {
        $employee = User::where('group', 'employee')->with('employee')->findOrFail($id);
        return view('admin::employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = User::where('group', 'employee')->with('employee')->findOrFail($id);
        return view('admin::employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('group', 'employee')->findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|confirmed|min:6',
            'is_active' => 'boolean',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'cccd' => 'nullable|string|max:20',
            'salary' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'status' => 'nullable|string|max:100',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        $employeeData = collect($data)->only(['birth_date', 'gender', 'cccd', 'salary', 'start_date', 'status'])->toArray();

        if ($user->employee) {
            $user->employee->update($employeeData);
        } else {
            $user->employee()->create($employeeData);
        }

        return redirect()->route('admin.employees.index')->with('success', 'Cập nhật nhân viên thành công.');
    }

    public function destroy($id)
    {
        $user = User::where('group', 'employee')->with('employee')->findOrFail($id);
    
        // Xoá employee nếu có
        if ($user->employee) {
            $user->employee->delete();
        }
    
        // Xoá user
        $user->delete();
    
        return redirect()->route('admin.employees.index')->with('success', 'Xóa nhân viên thành công.');
    }
    
}
