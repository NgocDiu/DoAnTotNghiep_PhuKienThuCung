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
                            <button class="btn btn-primary btn-sm btn-update-price" data-bs-toggle="modal"
                                data-bs-target="#updatePriceModal" data-product-id="{{ $pro->id }}"
                                data-product-name="{{ $pro->name }}" data-import-price="{{ $pro->import_price }}"
                                data-old-price="{{ $pro->price }}"
                                data-profit-percent="{{ $pro->categories->first()?->parent?->profit_percent ?? ($pro->categories->first()?->profit_percent ?? 3) }}">
                                Cập nhật giá bán
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal cập nhật giá bán -->
    <!-- Modal cập nhật giá bán -->
    <div class="modal fade" id="updatePriceModal" tabindex="-1" aria-labelledby="updatePriceModalLabel">
        <div class="modal-dialog modal-dialog-centered">
            <form id="updatePriceForm" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content" style="border-radius: 14px;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold" id="updatePriceModalLabel" style="font-size: 1.1rem;">
                            Xác nhận cập nhật giá bán
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>

                    <div class="modal-body" style="padding-right: 50px">
                        <input type="hidden" name="product_id" id="modalProductId">

                        <div class="mb-2">
                            <p><strong>Sản phẩm:</strong> <span id="modalProductName" class="text-primary"></span></p>
                            <p><strong>Giá bán hiện tại:</strong> <span id="modalOldPrice"></span> ₫</p>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Giá nhập mới <span class="required">*</span></label>
                                <input type="number" class="form-control" name="import_price" id="modalImportPrice"
                                    min="0" required oninput="updateNewPrice()" />
                                <div class="invalid-feedback">Vui lòng nhập giá nhập hợp lệ.</div>
                            </div>

                            <p><strong>Giá bán mới (dự kiến):</strong> <span id="modalNewPrice"></span> ₫</p>
                        </div>
                    </div>

                    <div class="modal-footer border-0 pt-0">
                        <button type="submit" class="btn btn-success px-4">Xác nhận cập nhật</button>
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

    <script>
        let profitPercent = 0;

        function updateNewPrice() {
            const importPrice = parseFloat(document.getElementById('modalImportPrice').value || 0);
            const newPrice = Math.round(importPrice * (1 + profitPercent / 100));
            document.getElementById('modalNewPrice').textContent = newPrice.toLocaleString('vi-VN');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn-update-price');
            const form = document.getElementById('updatePriceForm'); // 👈 Thêm dòng này

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    const productName = this.dataset.productName;
                    const importPrice = parseFloat(this.dataset.importPrice || 0);
                    const oldPrice = parseFloat(this.dataset.oldPrice || 0);
                    profitPercent = parseFloat(this.dataset.profitPercent || 3);

                    const newPrice = Math.round(importPrice * (1 + profitPercent / 100));

                    // 👇 Sửa ở đây: cập nhật form action đúng
                    form.action = `/admin/products/update-price/${productId}`;

                    document.getElementById('modalProductId').value = productId;
                    document.getElementById('modalProductName').textContent = productName;
                    document.getElementById('modalOldPrice').textContent = oldPrice.toLocaleString(
                        'vi-VN');
                    document.getElementById('modalImportPrice').value = importPrice;
                    document.getElementById('modalNewPrice').textContent = newPrice.toLocaleString(
                        'vi-VN');

                    const modalEl = document.getElementById('updatePriceModal');
                    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                    document.activeElement?.blur();
                    modal.show();
                });
            });
        });
    </script>
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
