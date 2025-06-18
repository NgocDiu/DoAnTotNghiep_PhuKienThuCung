@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <h1>Quản lý Vai trò (Roles)</h1>
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
        {{-- Nút mở modal Thêm --}}
        <div class="text-end">
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRoleModal">Thêm mới Vai
                trò</button>
        </div>


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
                            <!-- Nút mở modal Sửa -->
                            <button class="btn btn-warning btn-sm m-1" data-bs-toggle="modal"
                                data-bs-target="#editRoleModal{{ $role->id }}">
                                Sửa
                            </button>

                            <!-- Nút mở modal Xóa -->
                            <button class="btn btn-danger btn-sm m-1" data-bs-toggle="modal"
                                data-bs-target="#deleteRoleModal{{ $role->id }}">
                                Xóa
                            </button>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        @foreach ($roles as $role)
            <!-- Modal SỬA -->
            <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="needs-validation"
                        novalidate>
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Sửa Vai trò</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Tên vai trò <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ $role->name }}"
                                        required>
                                    <div class="invalid-feedback">Vui lòng nhập tên vai trò.</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Gán quyền</label>
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                                        value="{{ $permission->name }}"
                                                        id="edit_{{ $role->id }}_{{ $permission->id }}"
                                                        {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="edit_{{ $role->id }}_{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-success">Lưu</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Modal XÓA -->
            <div class="modal fade" id="deleteRoleModal{{ $role->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="modal-content">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title">Xác nhận xóa vai trò</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xóa vai trò <strong>{{ $role->name }}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger">Xóa</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
        {{ $roles->links() }}

    </div>

    {{-- Modal Thêm --}}
    <div class="modal fade" id="addRoleModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('admin.roles.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm mới Vai trò</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="roleName" class="form-label">Tên vai trò <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" id="roleName" required>
                            <div id="roleNameFeedback" class="invalid-feedback">Vui lòng nhập tên vai trò.</div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Gán quyền</label>
                            <div class="row">
                                @foreach ($permissions->chunk(ceil($permissions->count() / 4)) as $chunk)
                                    <div class="col-md-3">
                                        @foreach ($chunk as $permission)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    value="{{ $permission->name }}" id="perm_{{ $permission->id }}">
                                                <label class="form-check-label" for="perm_{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Thêm</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.needs-validation');
            forms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const roleNameInput = document.getElementById('roleName');
            const feedback = document.getElementById('roleNameFeedback');

            if (!roleNameInput) return;

            // Có thể dùng blur hoặc change hoặc input tuỳ ý:
            roleNameInput.addEventListener('input', function() {
                roleNameInput.classList.remove('is-invalid', 'is-valid');
                const name = roleNameInput.value.trim();
                if (!name) {
                    roleNameInput.classList.add('is-invalid');
                    feedback.textContent = 'Vui lòng nhập tên vai trò.';
                    return;
                }

                fetch("{{ route('admin.roles.checkName') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            name
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        roleNameInput.classList.remove('is-valid', 'is-invalid');
                        if (data.exists) {
                            roleNameInput.classList.add('is-invalid');
                            feedback.textContent = 'Tên vai trò đã tồn tại!';
                        } else {
                            // Nếu bạn muốn tick xanh thì:
                            // roleNameInput.classList.add('is-valid');
                            feedback.textContent = '';
                        }
                    });
            });
        });
    </script>
@endsection
