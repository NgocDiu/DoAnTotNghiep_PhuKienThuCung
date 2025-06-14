<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

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
            'slug' => 'required|unique:categories,slug',
        ]);

        Category::create($request->only('name', 'slug', 'parent_id'));
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công');
    }
    public function checkSlug(Request $request)
    {
        $slug = $request->input('slug');
        $exists = \App\Models\Category::where('slug', $slug)->exists();

        return response()->json(['exists' => $exists]);
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $category->id,
        ]);

        $category->update($request->only('name', 'slug', 'parent_id'));
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công');
    }

    public function destroy(Category $category)
{
    try {
        $category->delete();

        return redirect()->back()->with('success', 'Đã xóa danh mục thành công!');
    } catch (QueryException $e) {
        // Kiểm tra mã lỗi SQL Server liên quan đến ràng buộc khóa ngoại
        if ($e->getCode() == '23000') {
            return redirect()->back()->with('error', 'Không thể xóa danh mục vì vẫn còn danh mục con.');
        }

        // Lỗi khác (không phải ràng buộc FK)
        return redirect()->back()->with('error', 'Xóa không thành công. Vui lòng thử lại sau.');
    }
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
