@extends('admin::layouts.master')

@section('content')
    <style>
        .div.dt-container div.dt-length select {
            width: 62px !important;
        }
    </style>
    <div class="container">
        <div class="pt-4 d-flex flex-row justify-content-between">
            <h4>Danh sách danh mục</h4>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Thêm danh mục</button>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @php
            function renderCategoryRows($categories, $level = 0, $allCategories, &$index = 1)
            {
                foreach ($categories as $cat) {
                    echo '<tr>';
                    echo '<td>' . $index++ . '</td>';
                    echo '<td>' . str_repeat('&mdash; ', $level) . e($cat->name) . '</td>';
                    echo '<td>' . ($cat->parent?->name ?? '-') . '</td>';
                    echo '<td>' . e($cat->slug) . '</td>';
                    echo '<td>
                    <button class="btn btn-sm btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editModal' .
                        $cat->id .
                        '">Sửa</button>
                    <button class="btn btn-sm btn-danger m-1" data-bs-toggle="modal" data-bs-target="#deleteModal' .
                        $cat->id .
                        '">Xóa</button>
                </td>';
                    echo '</tr>';

                    if ($cat->children && $cat->children->count()) {
                        renderCategoryRows($cat->children, $level + 1, $allCategories, $index);
                    }
                }
            }

            function renderCategoryOptions($categories, $level = 0, $selectedId = null, $excludeId = null)
            {
                foreach ($categories as $cat) {
                    if ($cat->id == $excludeId) {
                        continue;
                    }

                    echo '<option value="' . $cat->id . '"';
                    if ($cat->id == $selectedId) {
                        echo ' selected';
                    }
                    echo '>' . str_repeat('&mdash; ', $level) . e($cat->name) . '</option>';

                    if ($cat->children && $cat->children->count()) {
                        renderCategoryOptions($cat->children, $level + 1, $selectedId, $excludeId);
                    }
                }
            }
        @endphp

        <table id="categoriesTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Danh mục cha</th>
                    <th>Slug</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @php $index = 1; @endphp
                {{ renderCategoryRows($categories, 0, $allCategories, $index) }}
            </tbody>
        </table>
    </div>

    <!-- Modal THÊM -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.categories.store') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Thêm danh mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tên</label>
                        <input name="name" class="form-control" required title="Vui lòng điền vào trường này">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input name="slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Danh mục cha</label>
                        <select name="parent_id" class="form-select">
                            <option value="">-- Không có --</option>
                            {{ renderCategoryOptions($categories) }}
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal SỬA + XÓA -->
    @foreach ($allCategories as $cat)
        <div class="modal fade" id="editModal{{ $cat->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.categories.update', $cat->id) }}" class="modal-content">
                    @csrf @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa danh mục</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tên</label>
                            <input name="name" value="{{ $cat->name }}" class="form-control" required
                                title="Vui lòng điền vào trường này">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input name="slug" value="{{ $cat->slug }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Danh mục cha</label>
                            <select name="parent_id" class="form-select">
                                <option value="">-- Không có --</option>
                                {{ renderCategoryOptions($categories, 0, $cat->parent_id, $cat->id) }}
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Lưu</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="deleteModal{{ $cat->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.categories.destroy', $cat->id) }}" class="modal-content">
                    @csrf @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title">Xác nhận xóa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa danh mục "<strong>{{ $cat->name }}</strong>"?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger">Xóa</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#categoriesTable').DataTable({
                language: {
                    url: "{{ asset('modules/admin/datatable/i18n/vi.json') }}"
                }
            });
        });
    </script>
@endpush
