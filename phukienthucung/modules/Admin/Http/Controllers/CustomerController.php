<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('group', 'customer');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%")
                  ->orWhere('email', 'like', "%$keyword%")
                  ->orWhere('phone', 'like', "%$keyword%");
            });
        }

        $customers = $query->latest()->get();

        return view('admin::customers.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = User::where('group', 'customer')->findOrFail($id);
        return view('admin::customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = User::where('group', 'customer')->findOrFail($id);
        return view('admin::customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = User::where('group', 'customer')->findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($customer->id)],
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|confirmed|min:6',
            'is_active' => 'boolean',
        ]);

        // Không cho sửa group
        unset($data['group']);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $customer->update($data);

        return redirect()->route('admin.customers.index')->with('success', 'Cập nhật khách hàng thành công.');
    }

    public function destroy($id)
    {
        $customer = User::where('group', 'customer')->findOrFail($id);
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Xóa khách hàng thành công.');
    }
}
