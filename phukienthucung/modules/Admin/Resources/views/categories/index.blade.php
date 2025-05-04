@extends('admin::layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="pt-4 d-flex flex-row justify-content-between">
            <h4>Danh sách danh mục</h4>

            <!-- Nút mở modal thêm -->
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Thêm danh mục</button>

        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Bảng danh mục -->
        <table class="table table-bordered table-hover">
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
                @foreach ($categories as $cat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->parent->name ?? '-' }}</td>
                        <td>{{ $cat->slug }}</td>
                        <td>
                            <!-- Nút sửa -->
                            <button class="btn btn-sm btn-warning m-1" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $cat->id }}">Sửa</button>

                            <!-- Nút xóa -->
                            <button class="btn btn-sm btn-danger m-1" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $cat->id }}">Xóa</button>
                        </td>
                    </tr>
                @endforeach
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
                        <input name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input name="slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Danh mục cha</label>
                        <select name="parent_id" class="form-select">
                            <option value="">-- Không có --</option>
                            @foreach ($categories as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Thêm</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal SỬA + XÓA - đặt ngoài bảng -->
    @foreach ($categories as $cat)
        <!-- Modal SỬA -->
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
                            <input name="name" value="{{ $cat->name }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input name="slug" value="{{ $cat->slug }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Danh mục cha</label>
                            <select name="parent_id" class="form-select">
                                <option value="">-- Không có --</option>
                                @foreach ($categories as $parent)
                                    @if ($parent->id != $cat->id)
                                        <option value="{{ $parent->id }}"
                                            {{ $cat->parent_id == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Lưu</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal XÓA -->
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
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
