@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <div class="pt-4 d-flex flex-row justify-content-between">
            <h4>Danh sách sản phẩm</h4>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">+ Thêm sản phẩm</a>
        </div>

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


        <table id="productsTable" class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Thương hiệu</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th width="160">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $pro)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @php
                                $mainImage = $pro->images->firstWhere('is_main', 1);
                            @endphp
                            @if ($mainImage)
                                <img src="{{ asset($mainImage->image_url) }}" width="60" height="60"
                                    class="img-thumbnail">
                            @else
                                <span class="text-muted">Không ảnh</span>
                            @endif
                        </td>
                        <td>{{ $pro->name }}</td>
                        <td>{{ $pro->brand->name ?? '-' }}</td>
                        <td>
                            @foreach ($pro->categories as $cat)
                                <span class="badge bg-secondary">{{ $cat->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if ($pro->is_discount)
                                <span class="text-muted"><del>{{ number_format($pro->price) }}₫</del></span><br>
                                <strong class="text-danger">{{ number_format($pro->discount_price) }}₫</strong>
                            @else
                                {{ number_format($pro->price) }}₫
                            @endif
                        </td>
                        <td>
                            @if ($pro->is_active)
                                <span class="badge bg-success">Hiển thị</span>
                            @else
                                <span class="badge bg-danger">Ẩn</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $pro->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $pro->id }}">Xóa</button>
                        </td>

                    </tr>
                    <!-- Modal xác nhận XÓA sản phẩm -->
                    <!-- Modal XÓA sản phẩm -->
                @endforeach
            </tbody>
        </table>


        @foreach ($products as $pro)
            <!-- Modal xác nhận XÓA sản phẩm -->
            <!-- Modal XÓA sản phẩm -->
            <div class="modal fade" id="deleteModal{{ $pro->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('admin.products.destroy', $pro->id) }}" method="POST" class="modal-content">
                        @csrf @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title">Xóa sản phẩm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xóa sản phẩm "<strong>{{ $pro->name }}</strong>"?
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger">Xóa</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#productsTable').DataTable({
                "language": {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
