<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attribute;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::latest()->get();
        return view('admin::attributes.index', compact('attributes'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:attributes,name']);
        Attribute::create($request->only('name'));
        return redirect()->route('admin.attributes.index')->with('success', 'Thêm thuộc tính thành công');
    }

    public function checkName(Request $request)
{
    $name = $request->input('name');
    $exists = \App\Models\Attribute::where('name', $name)->exists();

    return response()->json(['exists' => $exists]);
}

    public function update(Request $request, Attribute $attribute)
    {
        $request->validate(['name' => 'required|string|unique:attributes,name,' . $attribute->id]);
        $attribute->update($request->only('name'));
        return redirect()->route('admin.attributes.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(Attribute $attribute)
    {
        // Nếu có sản phẩm đang dùng thuộc tính này
        if ($attribute->productAttributeValues()->exists()) {
            return redirect()->route('admin.attributes.index')
                ->with('error', 'Không thể xóa: thuộc tính này đang được sử dụng trong sản phẩm.');
        }

        $attribute->delete();

        return redirect()->route('admin.attributes.index')->with('success', '✅ Xóa thuộc tính thành công.');
    }

}
