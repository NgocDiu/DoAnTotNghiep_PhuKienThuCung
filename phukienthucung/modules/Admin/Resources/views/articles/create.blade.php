{{-- Create view --}}
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
        <h3 class="my-4">Thêm bài viết</h3>
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tiêu đề <span class="required">*</span></label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Slug <span class="required">*</span></label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung <span class="required">*</span></label>
                <textarea name="content" class="form-control" id="ckeditor_create" rows="6" required></textarea>
            </div>
            <div class="mb-3">
                <label><input type="checkbox" name="is_active" value="1"> Hiển thị</label>
            </div>
            <div class="mb-3">
                <label><input type="checkbox" name="is_outstanding" value="1"> Nổi bật</label>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
    <script src="{{ asset('modules/admin/lib/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor_create');
    </script>
@endsection
