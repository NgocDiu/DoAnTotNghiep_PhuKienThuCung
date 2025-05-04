<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->orderByDesc('id')->get();
        return view('admin::categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'nullable|unique:categories,slug',
        ]);

        Category::create($request->only('name', 'slug', 'parent_id'));
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'nullable|unique:categories,slug,' . $category->id,
        ]);

        $category->update($request->only('name', 'slug', 'parent_id'));
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công');
    }
}
