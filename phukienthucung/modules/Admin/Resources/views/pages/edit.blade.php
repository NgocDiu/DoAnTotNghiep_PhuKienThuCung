{{-- edit.blade.php --}}
@extends('admin::layouts.master')
@section('content')
    <div class="container py-4">
        <h3 class="mb-4">Sửa trang</h3>
        <form action="{{ route('admin.pages.update', $page) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Tiêu đề</label>
                <input type="text" name="title" class="form-control" value="{{ $page->title }}" required>
            </div>
            <div class="mb-3">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ $page->slug }}">
            </div>
            <div class="mb-3">
                <label>Nội dung</label>
                <textarea name="content" id="ckeditor_edit" class="form-control" rows="8" required>{{ $page->content }}</textarea>
            </div>
            <div class="mb-3">
                <label>Menu hiển thị (tĩnh)</label>
                <select name="menu_id" class="form-select">
                    <option value="">-- Không gán --</option>
                    @foreach (getPagesMenus() as $menu)
                        <option value="{{ $menu->id }}" {{ $page->menu_id == $menu->id ? 'selected' : '' }}>
                            {{ $menu->title }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success">Cập nhật</button>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
    <script src="{{ asset('modules/admin/lib/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor_edit');
    </script>
@endsection
