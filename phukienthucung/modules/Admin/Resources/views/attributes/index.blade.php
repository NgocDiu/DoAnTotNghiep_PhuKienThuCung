@extends('admin::layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="pt-4 d-flex flex-row justify-content-between">
            <h4>Danh sách thuộc tính</h4>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Thêm thuộc tính</button>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="attributesTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên thuộc tính</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attributes as $attribute)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attribute->name }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $attribute->id }}">Sửa</button>

                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $attribute->id }}">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Thêm -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('admin.attributes.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Thêm thuộc tính</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tên thuộc tính</label>
                        <input name="name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Sửa & Xóa -->
    @foreach ($attributes as $attribute)
        <!-- Modal Sửa -->
        <div class="modal fade" id="editModal{{ $attribute->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST" class="modal-content">
                    @csrf @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa thuộc tính</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tên thuộc tính</label>
                            <input name="name" value="{{ $attribute->name }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Lưu</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Xóa -->
        <div class="modal fade" id="deleteModal{{ $attribute->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST"
                    class="modal-content">
                    @csrf @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa thuộc tính</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa thuộc tính "<strong>{{ $attribute->name }}</strong>"?
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
            $('#attributesTable').DataTable({
                "language": {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
