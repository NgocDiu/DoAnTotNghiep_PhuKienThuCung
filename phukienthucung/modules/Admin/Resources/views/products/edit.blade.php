@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <h4 class="pt-3">Sửa sản phẩm: {{ $product->name }}</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Tên sản phẩm <span class="required">*</span></label>
                    <input name="name" class="form-control" value="{{ $product->name }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Slug <span class="required">*</span></label>
                    <input name="slug" class="form-control" value="{{ $product->slug }}" required>
                </div>



            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea id="description" rows="6" name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Giá gốc <span class="required">*</span></label>
                    <input name="price" type="number" step="0.01" class="form-control" value="{{ $product->price }}"
                        required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Giá giảm</label>
                    <input name="discount_price" type="number" step="0.01" class="form-control"
                        value="{{ $product->discount_price }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Số lượng tồn kho <span class="required">*</span></label>
                    <input name="stock_quantity" type="number" min="0" class="form-control"
                        value="{{ $product->stock_quantity }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Thương hiệu <span class="required">*</span></label>
                    <select name="brand_id" class="form-select select2" required>
                        <option value="">-- Chọn thương hiệu --</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-8">
                    <label class="form-label">Danh mục <span class="required">*</span></label>
                    <select name="category_ids[]" class="form-select select2" multiple required>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ in_array($cat->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Chọn nhiều bằng Ctrl (hoặc Cmd trên Mac)</small>
                </div>

            </div>

            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="checkbox" name="is_active" id="active"
                    {{ $product->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="active">Hiển thị sản phẩm</label>
            </div>
            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="checkbox" name="is_discount" id="discount"
                    {{ $product->is_discount ? 'checked' : '' }}>
                <label class="form-check-label" for="discount">Có giảm giá</label>
            </div>

            <hr>
            <h5>Thuộc tính sản phẩm</h5>
            @foreach ($attributes as $attr)
                @php
                    $existing = $product->attributeValues->firstWhere('attribute_id', $attr->id);
                @endphp
                <div class="mb-3">
                    <label class="form-label">{{ $attr->name }}</label>
                    <input type="hidden" name="product_attributes[{{ $loop->index }}][id]" value="{{ $attr->id }}">
                    <input type="text" name="product_attributes[{{ $loop->index }}][value]"
                        value="{{ $existing->value ?? '' }}" class="form-control">
                </div>
            @endforeach

            <hr>
            <h5>Ảnh sản phẩm hiện tại</h5>
            <div class="row mb-3">
                <div class="d-flex flex-wrap gap-3">
                    @foreach ($product->images as $img)
                        <div style="position: relative; width: 120px;">
                            <img src="{{ asset($img->image_url) }}" alt="Ảnh sản phẩm"
                                style="width: 100%; height: 120px; object-fit: cover; border: 1px solid #ccc; border-radius: 6px;">
                            @if ($img->is_main)
                                <span
                                    style="position: absolute; top: 6px; left: 6px; background: green; color: white; font-size: 12px; padding: 2px 6px; border-radius: 4px;">
                                    Ảnh chính
                                </span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <p class="text-danger small mt-2">Khi chọn ảnh mới, toàn bộ ảnh cũ sẽ bị xóa!</p>

            <div class="mb-4">
                <label class="form-label">Tải ảnh mới (tùy chọn)</label>
                <input type="file" name="images[]" class="form-control" multiple>
            </div>

            <div class="d-flex flex-row justify-content-end">
                <button class="btn btn-primary mx-1">Cập nhật sản phẩm</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Hủy</a>
            </div>
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
