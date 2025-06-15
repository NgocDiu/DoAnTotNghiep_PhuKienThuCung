{{-- Edit view --}}
@extends('admin::layouts.master')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3 class="my-4">Sửa bài viết</h3>

        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data"
            class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Tiêu đề <span class="required">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
                <div class="invalid-feedback">Vui lòng nhập tiêu đề.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Slug <span class="required">*</span></label>
                <input type="text" name="slug" class="form-control" value="{{ $article->slug }}" required>
                <div class="invalid-feedback">Vui lòng nhập slug.</div>
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
                <label class="form-label">Nội dung <span class="required">*</span></label>
                <textarea name="content" class="form-control" id="ckeditor_edit" rows="6" required>{{ $article->content }}</textarea>
                <div class="invalid-feedback">Vui lòng nhập nội dung.</div>
            </div>

            <div class="mb-3">
                <label>
                    <input type="checkbox" name="is_active" value="1" {{ $article->is_active ? 'checked' : '' }}>
                    Hiển thị
                </label>
            </div>

            <div class="mb-3">
                <label>
                    <input type="checkbox" name="is_outstanding" value="1"
                        {{ $article->is_outstanding ? 'checked' : '' }}>
                    Nổi bật
                </label>
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach((form) => {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    </script>

    <script src="{{ asset('modules/admin/lib/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor_edit');
    </script>
@endsection
