@extends('admin::layouts.master')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Quản lý khách hàng</h2>
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
        <table class="table table-bordered table-hover align-middle" id="customerTable">
            <thead class="table-light">
                <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Trạng thái</th>
                    <th class="text-end">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            <span class="badge {{ $customer->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $customer->is_active ? 'Hoạt động' : 'Tạm khóa' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $customer->id }}">
                                Sửa
                            </button>
                        </td>
                    </tr>

                    <!-- Modal sửa -->
                    <div class="modal fade" id="editModal{{ $customer->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('admin.customers.update', $customer->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Sửa khách hàng: {{ $customer->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Họ tên</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $customer->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $customer->email }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Số điện thoại</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ $customer->phone }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu mới (nếu đổi)</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Xác nhận mật khẩu</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                                id="active{{ $customer->id }}"
                                                {{ $customer->is_active ? 'checked' : '' }}>
                                            <label class="form-check-label" for="active{{ $customer->id }}">
                                                Đang hoạt động
                                            </label>
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
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable({
                language: {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
