<?php
namespace Modules\Publish\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Http;

class InformationController extends Controller
{
    //private $token = '325bef5d-1a87-11f0-9b81-222185cb68c8';
    private $token = '2e8adeb0-1a81-11f0-9f4c-529f157d1a4f';
    private $ShopId = '196412';


    public function index()
{
    $user = auth('publish')->user();

    // Gọi API lấy danh sách tỉnh
    $provinces = Http::withHeaders([
        'Token' => $this->token,
    ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/province')->json('data');

    $addresses = Address::where('user_id', $user->id)->get();

    return view('publish::information.index', compact('user', 'addresses', 'provinces'));
}


public function storeAddress(Request $request)
{
    $user = auth('publish')->user();

    $request->validate([
        'to_name' => 'required',
        'to_phone' => 'required|digits:10',
        'to_address' => 'required|max:40',
        'to_province_id' => 'required|integer',
        'province_desc' => 'required',
        'to_district_id' => 'required|integer',
        'district_desc' => 'required',
        'to_ward_code' => 'required',
        'ward_desc' => 'required',
    ]);
    if ($request->has('is_default')) {
        // Reset tất cả địa chỉ khác về không mặc định
        Address::where('user_id', $user->id)->update(['is_default' => 0]);
    }
    
    


    $full = $request->to_address . ', ' . $request->ward_desc . ', ' . $request->district_desc . ', ' . $request->province_desc;

    Address::create([
        'user_id' => $user->id,
        'to_name' => $request->to_name,
        'to_phone' => $request->to_phone,
        'to_address' => $request->to_address,
        'to_province_id' => $request->to_province_id,       // ✅ sửa lại đồng bộ
        'province_desc' => $request->province_desc,
        'to_district_id' => $request->to_district_id,       // ✅ sửa lại đồng bộ
        'district_desc' => $request->district_desc,
        'to_ward_code' => $request->to_ward_code,           // ✅ sửa lại đồng bộ
        'ward_desc' => $request->ward_desc,
        'full_address' => $full,
        'is_default' => $request->has('is_default'),
    ]);
   


    return back()->with('success', 'Đã thêm địa chỉ mới!');
}


    public function updateAddress(Request $request, $id)
{
    $address = Address::findOrFail($id);

    $request->validate([
        'to_name' => 'required',
        'to_phone' => 'required|digits:10',
        'to_address' => 'required|max:40',
        'province_id' => 'required|integer',
        'province_desc' => 'required',
        'district_id' => 'required|integer',
        'district_desc' => 'required',
        'ward_code' => 'required',            // ✅ sửa lại tên này
        'ward_desc' => 'required',
    ]);
    if ($request->has('is_default')) {
        Address::where('user_id', $address->user_id)->update(['is_default' => 0]);
    }
    

    $full = $request->to_address . ', ' . $request->ward_desc . ', ' . $request->district_desc . ', ' . $request->province_desc;

    $address->update([
        'to_name' => $request->to_name,
        'to_phone' => $request->to_phone,
        'to_address' => $request->to_address,
        'full_address' => $full,
        'to_province_id' => $request->province_id,
        'province_desc' => $request->province_desc,
        'to_district_id' => $request->district_id,
        'district_desc' => $request->district_desc,
        'to_ward_code' => $request->ward_code,       // ✅ gán đúng tên column
        'ward_desc' => $request->ward_desc,
        'is_default' => $request->has('is_default'),

    ]);

    return back()->with('success', 'Cập nhật địa chỉ thành công!');
}


    

    public function deleteAddress($id)
    {
        Address::findOrFail($id)->delete();
        return back()->with('success', 'Đã xóa địa chỉ!');
    }
    // Laravel controller
    public function getDistricts(Request $request)
    {
        // $token = '325bef5d-1a87-11f0-9b81-222185cb68c8';
         $token = '2e8adeb0-1a81-11f0-9f4c-529f157d1a4f';
    
        $provinceId = $request->province_id;
    
        $url = "https://online-gateway.ghn.vn/shiip/public-api/master-data/district?province_id=$provinceId";
    
        $response = Http::withHeaders([
            'Token' => $token,
            'Content-Type' => 'application/json'
        ])->post($url); // GHN cần query string, không nhận body
    
        $data = $response->json('data') ?? [];
    
        // Ghi log để kiểm tra
        \Log::debug('GHN API - Districts', [
            'province_id' => $provinceId,
            'count' => count($data),
            'example' => $data[0] ?? null
        ]);
    
        return response()->json($data);
    }
    
    
    public function getWards(Request $request)
    {
        $token = '325bef5d-1a87-11f0-9b81-222185cb68c8';
        $districtId = $request->district_id;

        $url = "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id=$districtId";

        $response = Http::withHeaders([
            'Token' => $token,
            'Content-Type' => 'application/json'
        ])->post($url); // Không truyền body

        $data = $response->json('data') ?? [];

        if (!is_array($data)) {
            $data = array_values((array)$data);
        }

        return response()->json($data);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Cập nhật thông tin cá nhân thành công!');
    }
    


}
