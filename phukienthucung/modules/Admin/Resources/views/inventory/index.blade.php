@extends('admin::layouts.master')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Danh sách sản phẩm tồn kho</h2>

        <table id="stockTable" class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mã sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th class="text-end">Số lượng tồn</th>
                    <th class="text-end">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->categories->pluck('name')->join(', ') }}</td>
                        <td>{{ $product->brand->name ?? '-' }}</td>
                        <td class="text-end">
                            <span
                                class="badge 
                              @if ($product->stock_quantity >= 50) bg-success
                              @elseif($product->stock_quantity >= 10)
                                  bg-warning text-dark
                              @else
                                  bg-danger @endif
                          ">
                                {{ $product->stock_quantity }}
                            </span>
                        </td>

                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#productModal{{ $product->id }}">
                                Chi tiết
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- All Modals --}}
    @foreach ($products as $product)
        <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông tin sản phẩm</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Tên:</strong> {{ $product->name }}</p>
                        <p><strong>Danh mục:</strong> {{ $product->categories->pluck('name')->join(', ') }}</p>
                        <p><strong>Thương hiệu:</strong> {{ $product->brand->name ?? '-' }}</p>
                        <p><strong>Số lượng tồn:</strong>
                            <span
                                class="badge 
                              @if ($product->stock_quantity >= 50) bg-success
                              @elseif($product->stock_quantity >= 10)
                                  bg-warning text-dark
                              @else
                                  bg-danger @endif
                          ">
                                {{ $product->stock_quantity }}
                            </span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <!-- DataTables (CDN or add to mix if using local) -->
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#stockTable').DataTable({
                language: {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
