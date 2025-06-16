@extends('admin::layouts.master')

@section('content')
    <div class="container mt-4">
        <h4>Chỉnh sửa đơn nhập hàng</h4>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('stock_imports.update', $import->id) }}">
            @csrf
            @method('PUT')



            <h5>Danh sách sản phẩm</h5>
            <div id="product-list">
                @foreach ($import->details as $index => $detail)
                    <div class="row mb-2 product-item">
                        <div class="col-md-4">
                            <select class="form-select" name="products[{{ $index }}][product_id]">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $detail->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="products[{{ $index }}][quantity]"
                                value="{{ $detail->quantity }}" placeholder="Số lượng">
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="products[{{ $index }}][unit_price]"
                                value="{{ $detail->unit_price }}" step="0.01" placeholder="Đơn giá">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-sm remove-product">X</button>
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($import->status != 'pending')
                <div class="text-end">
                    <button type="button" class="btn btn-sm btn-secondary mb-3" id="add-product">+ Thêm sản phẩm</button>

                </div>
            @endif

            <div class="my-3">
                <label for="note" class="form-label font-bold">Ghi chú</label>
                <input type="text" class="form-control" name="note" value="{{ old('note', $import->note) }}">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>

    <script>
        let index = {{ count($import->details) }};
        document.getElementById('add-product').addEventListener('click', function() {
            const container = document.createElement('div');
            container.classList.add('row', 'mb-2', 'product-item');
            container.innerHTML = `
            <div class="col-md-4">
                <select class="form-select" name="products[\${index}][product_id]">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control" name="products[\${index}][quantity]" placeholder="Số lượng">
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control" name="products[\${index}][unit_price]" step="0.01" placeholder="Đơn giá">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm remove-product">X</button>
            </div>
        `;
            document.getElementById('product-list').appendChild(container);
            index++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-product')) {
                e.target.closest('.product-item').remove();
            }
        });
    </script>
@endsection
