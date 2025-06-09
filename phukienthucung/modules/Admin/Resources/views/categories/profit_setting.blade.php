@extends('admin::layouts.master')

@section('content')
    <div class="container py-4">
        <h4 class="mb-3">Cập nhật lợi nhuận các danh mục cha</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="categoriesProfitTable" class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Tên danh mục</th>
                    <th>% lợi nhuận</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                    <tr>
                        <td><b>{{ $cat->name }}</b></td>
                        <td>
                            <form method="POST" action="{{ route('admin.categories.update_profit', $cat->id) }}"
                                class="d-flex align-items-center gap-2">
                                @csrf
                                <input type="number" name="profit_percent" value="{{ $cat->profit_percent }}" min="0"
                                    max="100" class="form-control form-control-sm" style="width:80px;" required>
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm">Lưu</button>
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
            $('#categoriesProfitTable').DataTable({
                language: {
                    url: "{{ asset('modules/admin/datatable/i18n/vi.json') }}"
                }
            });
        });
    </script>
@endpush
