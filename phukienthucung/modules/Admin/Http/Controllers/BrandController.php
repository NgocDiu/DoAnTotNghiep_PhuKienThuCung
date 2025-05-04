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


    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Đã xóa thương hiệu');
    }
}
