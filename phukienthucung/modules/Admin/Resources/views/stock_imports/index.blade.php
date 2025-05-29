@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="pt-2"></div>
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
        <div class="d-flex justify-content-between align-items-center pt-3 mb-3">
            <h2>Danh sách phiếu nhập hàng</h2>
            <a href="{{ route('admin.stock_imports.create') }}" class="btn btn-primary">+ Thêm phiếu nhập</a>
        </div>

        <div class="table-responsive">
            <table id="imports-table" class="table table-bordered">
                <thead class="">
                    <tr>
                        <th>Mã phiếu</th>
                        <th>Người tạo</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($imports as $import)
                        <tr>
                            <td>{{ $import->code }}</td>
                            <td>{{ $import->user->name }}</td>
                            <td>
                                @if ($import->status == 'pending')
                                    <span class="badge bg-warning text-dark">Chờ xác nhận</span>
                                @elseif ($import->status == 'confirmed')
                                    <span class="badge bg-success">Đã xác nhận</span>
                                @else
                                    <span class="badge bg-danger">Đã xóa</span>
                                @endif
                            </td>
                            <td>{{ $import->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    @if ($import->status == 'pending')
                                        @can('stock_confirm')
                                            <a href="{{ route('admin.stock_imports.show', $import->id) }}"
                                                class="btn btn-sm btn-primary">Xác nhận</a>
                                        @endcan


                                        @can('stock_delete')
                                            <button class="btn btn-sm btn-danger mx-1" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $import->id }}">Xóa</button>
                                        @endcan
                                    @endif
                                    <a href="{{ route('admin.stock_imports.edit', $import->id) }}"
                                        class="btn btn-sm btn-warning">Chi tiết</a>



                                    <!-- Modal xóa -->

                                </div>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach ($imports as $import)
        <div class="modal fade" id="deleteModal{{ $import->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $import->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.stock_imports.destroy', $import->id) }}">
                        @csrf @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title">Xác nhận xóa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xóa phiếu nhập
                            <strong>{{ $import->code }}</strong> không?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#imports-table').DataTable({
                language: {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
