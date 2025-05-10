<?php
namespace Modules\Admin\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin::articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin::articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'nullable|unique:articles,slug',
            'description' => 'nullable',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120'
        ]);

        $path = $request->file('image')->store('articles', 'public');

        Article::create([
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'description' => $request->description,
            'content' => $request->content,
            'image' => $path,
            'is_active' => $request->has('is_active'),
            'is_outstanding' => $request->has('is_outstanding'),
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Tạo bài viết thành công');
    }

    public function edit(Article $article)
    {
        return view('admin::articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'nullable|unique:articles,slug,' . $article->id,
            'description' => 'nullable',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120'
        ]);

        $data = [
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'description' => $request->description,
            'content' => $request->content,
            'is_active' => $request->has('is_active'),
            'is_outstanding' => $request->has('is_outstanding'),
        ];

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Cập nhật bài viết thành công');
    }

    public function destroy(Article $article)
    {
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Xóa bài viết thành công');
    }
}
