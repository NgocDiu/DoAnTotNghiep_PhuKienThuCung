<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children', 'parent')->whereNull('parent_id')->get();
        $allCategories = Category::all(); // dùng cho dropdown tạo/sửa
    
        return view('admin::categories.index', compact('categories', 'allCategories'));
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
    public function profitSetting()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin::categories.profit_setting', compact('categories'));
    }
    public function updateProfit(Request $request, Category $category)
    {
        $request->validate([
            'profit_percent' => 'required|numeric|min:0|max:100'
        ]);
        $category->profit_percent = $request->profit_percent;
        $category->save();
        return redirect()->route('admin.categories.profit_setting')->with('success', 'Đã cập nhật lợi nhuận!');
    }
}
