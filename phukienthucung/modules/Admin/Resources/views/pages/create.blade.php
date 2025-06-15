{{-- create.blade.php --}}
@extends('admin::layouts.master')
@section('content')
    <div class="container py-4">
        <h3 class="mb-4">Thêm trang mới</h3>
        <form action="{{ route('admin.pages.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label class="form-label">Tiêu đề <span class="required">*</span></label>
                <input type="text" name="title" class="form-control" required>
                <div class="invalid-feedback">Vui lòng nhập tiêu đề.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Nội dung <span class="required">*</span></label>
                <textarea name="content" id="ckeditor_create" class="form-control" rows="8" required></textarea>
                <div class="invalid-feedback">Vui lòng nhập nội dung.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Menu hiển thị (tĩnh)</label>
                <select name="menu_id" class="form-select">
                    <option value="">-- Không gán --</option>
                    @foreach (getPagesMenus() as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success" type="submit">Lưu</button>
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
        CKEDITOR.replace('ckeditor_create');
    </script>
@endsection
