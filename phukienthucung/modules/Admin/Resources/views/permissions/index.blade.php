@extends('admin::layouts.master')

@section('content')
    <div class="p-4">
        <h2 class="pb-4">Quản lý quyền (Permissions)</h2>
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

        {{-- Thông báo --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Đóng"></button>
            </div>
        @endif

        {{-- Form thêm quyền --}}
        <form action="{{ route('admin.permissions.store') }}" method="POST" class="row g-3 mb-4 needs-validation"
            novalidate>
            @csrf

            <div class="col-6">
                <input type="text" name="name" class="form-control" placeholder="Tên quyền mới" required>
                <div class="invalid-feedback">Vui lòng nhập tên quyền.</div>
            </div>

            <div class="col-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Thêm quyền</button>
            </div>
        </form>


        {{-- Danh sách quyền --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table">
                    <tr>
                        <th>#</th>
                        <th>Tên quyền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"
                                    data-id="{{ $permission->id }}" data-name="{{ $permission->name }}">
                                    Sửa
                                </button>

                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xoá?')">
                                        Xoá
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal sửa quyền --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="editForm" class="modal-content needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Sửa quyền</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>

                <div class="modal-body">
                    <input type="text" class="form-control" name="name" id="editPermissionName" required>
                    <div class="invalid-feedback">Vui lòng nhập tên quyền.</div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>

        </div>
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

    {{-- Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editModal = document.getElementById('editModal');
            editModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var name = button.getAttribute('data-name');

                var form = document.getElementById('editForm');
                form.action = "{{ url('admin/permissions') }}/" + id;
                document.getElementById('editPermissionName').value = name;
            });
        });
    </script>
@endsection
