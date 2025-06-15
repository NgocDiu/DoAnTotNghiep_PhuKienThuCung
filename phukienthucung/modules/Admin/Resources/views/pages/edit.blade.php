{{-- edit.blade.php --}}
@extends('admin::layouts.master')
@section('content')
    <div class="container py-4">
        <h3 class="mb-4">Sửa trang</h3>
        <form action="{{ route('admin.pages.update', $page) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Tiêu đề <span class="required">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ $page->title }}" required>
                <div class="invalid-feedback">Vui lòng nhập tiêu đề.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ $page->slug }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Nội dung <span class="required">*</span></label>
                <textarea name="content" id="ckeditor_edit" class="form-control" rows="8" required>{{ $page->content }}</textarea>
                <div class="invalid-feedback">Vui lòng nhập nội dung.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Menu hiển thị (tĩnh)</label>
                <select name="menu_id" class="form-select">
                    <option value="">-- Không gán --</option>
                    @foreach (getPagesMenus() as $menu)
                        <option value="{{ $menu->id }}" {{ $page->menu_id == $menu->id ? 'selected' : '' }}>
                            {{ $menu->title }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success" type="submit">Cập nhật</button>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
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
