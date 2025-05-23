<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        return view('admin::settings.edit', compact('setting'));
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'token' => 'required|string|max:255',
        'shop_id' => 'required|integer',
        'phone' => 'required|string|max:20',
        'province_id' => 'required|string|max:50',
        'province_desc' => 'required|string|max:50',
        'district_id' => 'required|string|max:50',
        'district_desc' => 'required|string|max:50',
        'ward_code' => 'required|string|max:50',
        'ward_name' => 'required|string|max:50',
    ]);

    $setting = Setting::first();
    if (!$setting) {
        return redirect()->back()->withErrors(['Không tìm thấy cấu hình']);
    }

    $fullAddress =  $request->ward_name . ', ' . $request->district_desc . ', ' . $request->province_desc;

    $setting->update([
        'name'           => $request->name,
        'token'          => $request->token,
        'shop_id'        => $request->shop_id,
        'phone'          => $request->phone,
        'address'        => $fullAddress,
        'province_id'    => $request->province_id,
        'province_name'  => $request->province_desc,
        'district_id'    => $request->district_id,
        'district_name'  => $request->district_desc,
        'ward_code'      => $request->ward_code,
        'ward_name'      => $request->ward_name,
    ]);

    return redirect()->back()->with('success', 'Cập nhật cấu hình thành công');
}


    public function destroy()
    {
        $setting = Setting::first();
        if ($setting) {
            $setting->delete();
        }

        return redirect()->back()->with('success', 'Đã xóa cấu hình');
    }
}
