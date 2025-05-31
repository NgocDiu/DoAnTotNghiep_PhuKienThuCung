@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <h4 class="pt-3">Thêm sản phẩm mới</h4>

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
                <textarea id="description" rows="6" name="description" class="form-control" rows="4"></textarea>
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
                    <select name="brand_id" class="form-select select2" required>
                        <option value="">-- Chọn thương hiệu --</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-8">
                    <label class="form-label">Danh mục</label>
                    <select name="category_ids[]" class="form-select select2" multiple required>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Chọn nhiều bằng Ctrl (hoặc Cmd trên Mac)</small>
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
    <script src="{{ asset('modules/admin/lib/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
@push('scripts')
    <script src="{{ asset('modules/admin/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('modules/admin/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Vui lòng chọn',
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endpush
