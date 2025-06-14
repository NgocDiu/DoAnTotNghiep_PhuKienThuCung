@extends('admin::layouts.master')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Quản lý nhân viên</h2>
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
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <table class="table table-bordered table-hover" id="employeeTable">
            <thead class="table-light">
                <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Lương</th>
                    <th>Trạng thái</th>
                    <th class="text-end">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ number_format($employee->employee->salary ?? 0) }} ₫</td>
                        <td>
                            <span class="badge {{ $employee->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $employee->is_active ? 'Hoạt động' : 'Tạm khóa' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $employee->id }}">
                                Sửa
                            </button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $employee->id }}">Xóa</button>
                        </td>
                    </tr>

                    <!-- Modal sửa -->
                    <div class="modal fade" id="editModal{{ $employee->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <form method="POST" action="{{ route('admin.employees.update', $employee->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Sửa nhân viên: {{ $employee->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Họ tên <span class="required">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $employee->name }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $employee->email }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Số điện thoại</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ $employee->phone }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Ngày sinh</label>
                                            <input type="date" name="birth_date" class="form-control"
                                                value="{{ $employee->employee->birth_date ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Giới tính</label>
                                            <select name="gender" class="form-select">
                                                <option value="">-- Chọn --</option>
                                                <option value="male"
                                                    {{ ($employee->employee->gender ?? '') == 'male' ? 'selected' : '' }}>
                                                    Nam</option>
                                                <option value="female"
                                                    {{ ($employee->employee->gender ?? '') == 'female' ? 'selected' : '' }}>
                                                    Nữ</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">CCCD</label>
                                            <input type="text" name="cccd" class="form-control"
                                                value="{{ $employee->employee->cccd ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Lương</label>
                                            <input type="number" name="salary" class="form-control"
                                                value="{{ $employee->employee->salary ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Ngày bắt đầu</label>
                                            <input type="date" name="start_date" class="form-control"
                                                value="{{ $employee->employee->start_date ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="is_active" class="form-label">Trạng thái hoạt động</label>
                                            <select name="is_active" id="is_active" class="form-select" required>
                                                <option value="1" {{ $employee->is_active ? 'selected' : '' }}>Đang
                                                    hoạt động</option>
                                                <option value="0" {{ !$employee->is_active ? 'selected' : '' }}>Ngưng
                                                    hoạt động</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mật khẩu mới (nếu đổi)</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Xác nhận mật khẩu</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Hủy</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal{{ $employee->id }}" tabindex="-1"
                        aria-labelledby="deleteModalLabel{{ $employee->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('admin.employees.destroy', $employee->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $employee->id }}">Xác nhận xoá
                                            nhân viên</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Đóng"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc muốn xoá nhân viên <strong>{{ $employee->name }}</strong> không?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Xoá</button>

                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Huỷ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#employeeTable').DataTable({
                "language": {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
