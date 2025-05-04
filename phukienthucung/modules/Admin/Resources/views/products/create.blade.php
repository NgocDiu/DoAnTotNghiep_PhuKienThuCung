@extends('admin::layouts.master')

@section('content')
    <div class="container mt-4">
        <h4>Thêm sản phẩm mới</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Tên sản phẩm</label>
                    <input name="name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Slug (tùy chọn)</label>
                    <input name="slug" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Giá gốc</label>
                    <input name="price" type="number" step="0.01" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Giá giảm</label>
                    <input name="discount_price" type="number" step="0.01" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Số lượng tồn kho</label>
                    <input name="stock_quantity" type="number" min="0" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Thương hiệu</label>
                    <select name="brand_id" class="form-select" required>
                        <option value="">-- Chọn thương hiệu --</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Danh mục</label>
                    <select name="category_ids[]" class="form-select" multiple required>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Giữ Ctrl để chọn nhiều</small>
                </div>
            </div>

            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="checkbox" name="is_active" id="active" checked>
                <label class="form-check-label" for="active">Hiển thị sản phẩm</label>
            </div>
            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="checkbox" name="is_discount" id="discount">
                <label class="form-check-label" for="discount">Có giảm giá</label>
            </div>

            <hr>
            <h5>Thuộc tính sản phẩm</h5>
            @foreach ($attributes as $attr)
                <div class="mb-3">
                    <label class="form-label">{{ $attr->name }}</label>
                    <input type="hidden" name="product_attributes[{{ $loop->index }}][id]" value="{{ $attr->id }}">
                    <input type="text" name="product_attributes[{{ $loop->index }}][value]" class="form-control"
                        placeholder="Nhập giá trị...">
                </div>
            @endforeach

            <hr>
            <h5>Ảnh sản phẩm</h5>
            <div class="mb-3">
                <input type="file" name="images[]" class="form-control" multiple>
                <small class="text-muted">Ảnh đầu tiên sẽ là ảnh đại diện (được resize 800x800)</small>
            </div>

            <button class="btn btn-primary">Thêm sản phẩm</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
