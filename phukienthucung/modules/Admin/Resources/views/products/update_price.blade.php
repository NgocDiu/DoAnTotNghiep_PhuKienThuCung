@extends('admin::layouts.master')

@section('content')
    <div class="container py-4">
        <h4 class="mb-3">Cập nhật giá bán sản phẩm</h4>

        @if (session('success'))
            <div class="alert alert-success">{!! session('success') !!}</div>
        @endif

        <table id="productsTable" class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Thương hiệu</th>
                    <th>Danh mục</th>
                    <th>Giá bán hiện tại</th>
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
                                    class="img-thumbnail" style="object-fit:cover;">
                            @else
                                <span class="text-muted">Không ảnh</span>
                            @endif
                        </td>
                        <td>{{ $pro->name }}</td>
                        <td>{{ $pro->brand->name ?? '-' }}</td>
                        <td>
                            @foreach ($pro->categories as $cat)
                                <span class="badge bg-secondary mb-1">{{ $cat->name }}</span>
                            @endforeach
                        </td>
                        <td>

                            <strong>{{ number_format($pro->price) }}₫</strong>
                        </td>
                        <td>
                            @if ($pro->is_active)
                                <span class="badge bg-success">Hiển thị</span>
                            @else
                                <span class="badge bg-danger">Ẩn</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm btn-update-price" type="button" data-bs-toggle="modal"
                                data-bs-target="#updatePriceModal" data-product-id="{{ $pro->id }}"
                                data-product-name="{{ $pro->name }}">
                                Cập nhật giá bán
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal cập nhật giá bán -->
    <div class="modal fade" id="updatePriceModal" tabindex="-1" aria-labelledby="updatePriceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="updatePriceForm" method="POST" action="">
                @csrf
                <div class="modal-content" style="border-radius: 14px;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold" id="updatePriceModalLabel" style="font-size: 1.1rem;">
                            Cập nhật giá bán cho <span id="modalProductName" class="text-primary"></span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="product_id" id="modalProductId" value="">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Giá nhập</label>
                            <input type="number" name="import_price" class="form-control form-control-lg" min="0"
                                required autocomplete="off" style="font-size:1.1rem;">
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="submit" class="btn btn-success px-4">Cập nhật</button>
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var updateModal = document.getElementById('updatePriceModal');
            updateModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var productId = button.getAttribute('data-product-id');
                var productName = button.getAttribute('data-product-name');
                document.getElementById('modalProductName').textContent = productName;
                document.getElementById('modalProductId').value = productId;
                document.getElementById('updatePriceForm').action = '/admin/products/update-price/' +
                    productId;
            });
        });
    </script>
@endpush
