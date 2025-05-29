@extends('admin::layouts.master')



@section('content')
    <div class="container">
        <h2>{{ $import->id ? 'Sửa' : 'Thêm' }} phiếu nhập hàng</h2>

        <form method="POST"
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
                                        required>
                                </td>
                                <td>
                                    <input type="number" name="products[{{ $i }}][unit_price]"
                                        value="{{ $detail['unit_price'] ?? ($detail->unit_price ?? '') }}"
                                        class="form-control" step="0.01" required>
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
@endpush
