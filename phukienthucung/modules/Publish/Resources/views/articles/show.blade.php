@extends('publish::layouts.master') {{-- Sử dụng layout chính của frontend --}}

@section('title', $article->title)

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <h1 class="mb-3">{{ $article->title }}</h1>

                <div class="mb-2 text-muted">
                    Đăng lúc {{ $article->created_at->format('d/m/Y H:i') }} • {{ $article->views }} lượt xem
                </div>

                @if ($article->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid" alt="{{ $article->title }}">
                    </div>
                @endif

                @if ($article->description)
                    <p class="lead mb-4">{{ $article->description }}</p>
                @endif

                <div class="article-content">
                    {!! $article->content !!}
                </div>

                <div class="mt-5">
                    <a href="{{ route('article.index') }}" class="btn btn-secondary">← Quay lại danh sách</a>
                </div>

            </div>
        </div>
    </div>
@endsection
