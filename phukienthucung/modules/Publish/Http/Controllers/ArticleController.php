<?php

namespace Modules\Publish\Http\Controllers;

use App\Http\Controllers\Controller; // 

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;

class ArticleController extends Controller
{
    // Danh sách bài viết đang active
    public function index()
    {
        $articles = Article::where('is_active', 1)
            ->orderByDesc('created_at')
            ->paginate(6);

        return view('publish::articles.index', compact('articles'));
    }

    // Chi tiết bài viết theo slug
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_active', 1)
            ->firstOrFail();

        // Tăng lượt xem
        $article->increment('views');

        return view('publish::articles.show', compact('article'));
    }
}