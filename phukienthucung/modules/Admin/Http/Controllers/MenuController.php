<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('position')->get();
        $categories = Category::all();
        return view('admin::menus.index', compact('menus', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:cate,static,page',
            'position' => 'required|integer',
            'category_id' => 'required_if:type,cate|nullable|exists:categories,id',
            'title' => 'required_if:type,static',
            'url' => 'required_if:type,static',
        ]);

        $menu = new Menu();
        $menu->type = $request->type;
        $menu->position = $request->position;

        if ($request->type === 'cate') {
            $category = Category::find($request->category_id);
            $menu->category_id = $category->id;
            $menu->title = $category->name;
            $menu->url = '/danh-muc/' . $category->slug;
        } else {
            $menu->title = $request->title;
            $menu->url = $request->url;
        }

        $menu->save();
        return redirect()->back()->with('success', 'Tạo menu thành công');
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'type' => 'required|in:cate,static,page',
            'position' => 'required|integer',
            'category_id' => 'required_if:type,cate|nullable|exists:categories,id',
            'title' => 'required_if:type,static',
            'url' => 'required_if:type,static',
        ]);

        $menu->type = $request->type;
        $menu->position = $request->position;
        $menu->category_id = null;

        if ($request->type === 'cate') {
            $category = Category::find($request->category_id);
            $menu->category_id = $category->id;
            $menu->title = $category->name;
            $menu->url = '/danh-muc/' . $category->slug;
        } else {
            $menu->title = $request->title;
            $menu->url = $request->url;
        }

        $menu->save();
        return redirect()->back()->with('success', 'Cập nhật menu thành công');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Xóa menu thành công');
    }
}