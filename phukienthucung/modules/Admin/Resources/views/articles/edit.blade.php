{{-- Edit view --}}
@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <h3 class="my-4">Sửa bài viết</h3>
        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ $article->slug }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="2">{{ $article->description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label><br>
                <input type="file" name="image" class="form-control">
                @if ($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" width="100" class="mt-2">
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea name="content" class="form-control" id="ckeditor_edit" rows="6" required>{{ $article->content }}</textarea>
            </div>
            <div class="mb-3">
                <label><input type="checkbox" name="is_active" value="1" {{ $article->is_active ? 'checked' : '' }}>
                    Hiển thị</label>
            </div>
            <div class="mb-3">
                <label><input type="checkbox" name="is_outstanding" value="1"
                        {{ $article->is_outstanding ? 'checked' : '' }}> Nổi bật</label>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
    <script src="{{ asset('modules/admin/lib/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor_edit');
    </script>
@endsection
