{{-- index.blade.php --}}
@extends('admin::layouts.master')
@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between mb-3">
            <h3>Danh sách trang</h3>
            <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Thêm trang</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="pagesTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Slug</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>
                            <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Xóa trang này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#pagesTable').DataTable({
                "language": {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
