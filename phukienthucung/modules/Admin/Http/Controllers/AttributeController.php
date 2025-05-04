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

    public function update(Request $request, Attribute $attribute)
    {
        $request->validate(['name' => 'required|string|unique:attributes,name,' . $attribute->id]);
        $attribute->update($request->only('name'));
        return redirect()->route('admin.attributes.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return redirect()->route('admin.attributes.index')->with('success', 'Xóa thành công');
    }
}
