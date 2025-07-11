<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin::brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:brands,name',
            'description' => 'nullable|string|max:1000',
        ]);

        Brand::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Thêm thương hiệu thành công');
    }
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|unique:brands,name,' . $brand->id,
            'description' => 'nullable|string|max:4000',
        ]);

        $brand->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Cập nhật thành công');
    }
    public function checkName(Request $request)
    {
        $name = $request->input('name');
        $exists = \App\Models\Brand::where('name', $name)->exists();
    
        return response()->json(['exists' => $exists]);
    }
    

    public function destroy(Brand $brand)
{
    if ($brand->products()->exists()) {
        return redirect()->back()->with('error', 'Không thể xóa thương hiệu vì vẫn còn sản phẩm nằm trong thương hiệu này.');
    }

    $brand->delete();
    return redirect()->back()->with('success', 'Đã xóa thương hiệu thành công.');
}

}
