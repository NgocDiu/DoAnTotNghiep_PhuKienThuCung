@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <h1>Quản lý Vai trò (Roles)</h1>

        {{-- Nút mở modal Thêm --}}
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRoleModal">Thêm mới Vai trò</button>

        {{-- Table Roles --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên vai trò</th>
                    <th>Quyền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-info">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            {{-- Nút Sửa --}}
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editRoleModal{{ $role->id }}">Sửa</button>

                            {{-- Nút Xóa --}}
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>

                    {{-- Modal Sửa --}}
                    <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Sửa Vai trò</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Tên vai trò</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $role->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Gán quyền</label>
                                            <div class="row">
                                                @foreach ($permissions as $permission)
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="permissions[]" value="{{ $permission->name }}"
                                                                {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }}>
                                                            <label class="form-check-label">{{ $permission->name }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success">Lưu</button>
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        {{ $roles->links() }}

    </div>

    {{-- Modal Thêm --}}
    <div class="modal fade" id="addRoleModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm mới Vai trò</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Tên vai trò</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label>Gán quyền</label>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                                value="{{ $permission->name }}">
                                            <label class="form-check-label">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Thêm</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
