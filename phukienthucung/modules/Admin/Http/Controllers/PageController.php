<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin::pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin::pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'nullable|unique:pages,slug',
            'content' => 'required',
        ]);

        Page::create([
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'content' => $request->content,
            'menu_id' => $request->menu_id,
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Đã thêm trang mới');
    }

    public function edit(Page $page)
    {
        return view('admin::pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'nullable|unique:pages,slug,' . $page->id,
            'content' => 'required',
        ]);

        $page->update([
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'content' => $request->content,
            'menu_id' => $request->menu_id,
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Đã cập nhật trang');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Đã xóa trang');
    }
}
