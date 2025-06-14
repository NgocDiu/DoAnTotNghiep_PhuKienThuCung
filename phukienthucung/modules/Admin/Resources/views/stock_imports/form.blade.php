@extends('admin::layouts.master')



@section('content')
    <div class="container">
        <h2>{{ $import->id ? 'Sửa' : 'Thêm' }} phiếu nhập hàng</h2>
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
        <form id="import-form" method="POST"
            action="{{ $import->id ? route('admin.stock_imports.update', $import->id) : route('admin.stock_imports.store') }}">
            @csrf
            @if ($import->id)
                @method('PUT')
            @endif


            <h5>Danh sách sản phẩm</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle" id="product-table">
                    <thead class="table-light">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá nhập</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (old('products', $details) as $i => $detail)
                            <tr>
                                <td>
                                    <select name="products[{{ $i }}][product_id]"
                                        class="form-select select-product" required>
                                        <option value="">-- Chọn sản phẩm --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ (isset($detail['product_id']) ? $detail['product_id'] : $detail->product_id ?? '') == $product->id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="products[{{ $i }}][quantity]"
                                        value="{{ $detail['quantity'] ?? ($detail->quantity ?? '') }}" class="form-control"
                                        required min="1" required>
                                </td>
                                <td>
                                    <input type="number" name="products[{{ $i }}][unit_price]"
                                        value="{{ $detail['unit_price'] ?? ($detail->unit_price ?? '') }}"
                                        class="form-control" step="0.01" min="0.01" required>
                                </td>
                                <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($import->status != 'confirmed')
                <div class="text-start">
                    <button type="button" class="btn btn-sm btn-warning" id="add-row">+ Thêm sản phẩm</button>

                </div>
            @endif

            <div class="my-3">
                <label for="note" class="form-label font-bold">Ghi chú</label>
                <textarea id="note" name="note" class="form-control" rows="3">{{ old('note', $import->note) }}</textarea>
            </div>

            <div class="text-end mt-4">
                @if ($import->status != 'confirmed')
                    <button type="submit" class="btn btn-primary"> Lưu phiếu nhập</button>
                @endif

                <a href="{{ route('admin.stock_imports.index') }}" class="btn btn-outline-secondary"> Quay lại</a>
            </div>

        </form>
    </div>

    <template id="row-template">
        <tr>
            <td>
                <select name="products[__INDEX__][product_id]" class="form-select select-product" required>
                    <option value="">-- Chọn sản phẩm --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="products[__INDEX__][quantity]" class="form-control" required></td>
            <td><input type="number" name="products[__INDEX__][unit_price]" class="form-control" step="0.01" required>
            </td>
            <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
        </tr>
    </template>
    <div class="modal fade" id="noProductModal" tabindex="-1" aria-labelledby="noProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-warning">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="noProductModalLabel">Không thể tạo phiếu nhập</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body text-center">
                    Bạn cần thêm ít nhất 1 sản phẩm trước khi tạo phiếu nhập hàng.
                </div>
                <div class="text-center my-2">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Đóng">Ok</button>
                </div>
            </div>

        </div>
    </div>


@endsection

@push('scripts')
    <script src="{{ asset('modules/admin/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('modules/admin/js/select2.min.js') }}"></script>
    <script>
        function reinitSelect2() {
            $('.select-product').select2({
                placeholder: 'Chọn sản phẩm',
                width: '100%'
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            reinitSelect2();

            document.getElementById('add-row').addEventListener('click', function() {
                const table = document.querySelector('#product-table tbody');
                const index = table.children.length;
                const template = document.getElementById('row-template').innerHTML.replace(/__INDEX__/g,
                    index);
                table.insertAdjacentHTML('beforeend', template);
                reinitSelect2();
            });

            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-row')) {
                    e.target.closest('tr').remove();
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('import-form');

            form.addEventListener('submit', function(e) {
                const rows = document.querySelectorAll('#product-table tbody tr');
                let isValid = true;
                let message = '';

                if (rows.length === 0) {
                    e.preventDefault();
                    message = 'Bạn phải thêm ít nhất một sản phẩm.';
                    showModalWarning(message);
                    return;
                }

                rows.forEach((row, index) => {
                    const qtyInput = row.querySelector('input[name*="[quantity]"]');
                    const priceInput = row.querySelector('input[name*="[unit_price]"]');

                    const qty = parseFloat(qtyInput?.value || '0');
                    const price = parseFloat(priceInput?.value || '0');

                    if (qty <= 0 || isNaN(qty)) {
                        isValid = false;
                        message += `- Dòng ${index + 1}: Số lượng phải > 0\n`;
                        qtyInput?.classList.add('is-invalid');
                    } else {
                        qtyInput?.classList.remove('is-invalid');
                    }

                    if (price <= 0 || isNaN(price)) {
                        isValid = false;
                        message += `- Dòng ${index + 1}: Giá nhập phải > 0\n`;
                        priceInput?.classList.add('is-invalid');
                    } else {
                        priceInput?.classList.remove('is-invalid');
                    }
                });

                if (!isValid) {
                    e.preventDefault(); // CHẶN SUBMIT CHẮC CHẮN 100%
                    showModalWarning(message);
                }
            });

            function showModalWarning(msg) {
                const modal = new bootstrap.Modal(document.getElementById('noProductModal'));
                document.querySelector('#noProductModal .modal-body').innerText = msg;
                modal.show();
            }
        });
    </script>
@endpush
