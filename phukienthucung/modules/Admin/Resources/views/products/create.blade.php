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

        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
            class="needs-validation" novalidate>
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Tên sản phẩm <span class="required">*</span></label>
                    <input name="name" class="form-control" required>
                    <div class="invalid-feedback">Vui lòng nhập tên sản phẩm.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Slug <span class="required">*</span></label>
                    <input name="slug" class="form-control" required>
                    <div class="invalid-feedback">Vui lòng nhập slug.</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea id="description" name="description" rows="6" class="form-control"></textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Giá gốc <span class="required">*</span></label>
                    <input name="price" type="number" step="0.01" class="form-control" required>
                    <div class="invalid-feedback">Vui lòng nhập giá sản phẩm.</div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Giá giảm</label>
                    <input name="discount_price" type="number" step="0.01" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Số lượng tồn kho <span class="required">*</span></label>
                    <input name="stock_quantity" type="number" min="0" class="form-control" required>
                    <div class="invalid-feedback">Vui lòng nhập số lượng tồn kho.</div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Thương hiệu <span class="required">*</span></label>
                    <select name="brand_id" class="form-select select2" required>
                        <option value="">-- Chọn thương hiệu --</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Vui lòng chọn thương hiệu.</div>
                </div>

                <div class="col-md-8">
                    <label class="form-label">Danh mục <span class="required">*</span></label>
                    <select name="category_ids[]" id="category_ids" class="form-select select2" multiple required>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Vui lòng chọn ít nhất một danh mục.</div>
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
            <h5>Ảnh sản phẩm <span class="required">*</span></h5>
            <div class="mb-3">
                <input type="file" name="images[]" class="form-control" multiple required>
                <div class="invalid-feedback">Vui lòng chọn ít nhất một ảnh sản phẩm.</div>
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

    <script src="{{ asset('modules/admin/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('modules/admin/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Vui lòng chọn',
                allowClear: true,
                width: '100%',
                minimumResultsForSearch: 0 // luôn hiển thị thanh tìm kiếm
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slugInput = document.querySelector('input[name="slug"]');
            const submitBtn = document.querySelector('form button[type="submit"]');

            slugInput.addEventListener('input', function() {
                const slug = slugInput.value.trim();
                if (!slug) {
                    removeSlugAlert();
                    submitBtn.disabled = true;
                    return;
                }

                fetch("{{ route('admin.products.checkSlug') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            slug: slug
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        removeSlugAlert();
                        if (data.exists) {
                            const alert = document.createElement('div');
                            alert.id = 'slug-alert';
                            alert.className = 'text-danger mt-1';
                            alert.textContent = 'Slug đã tồn tại, vui lòng chọn slug khác.';
                            slugInput.parentElement.appendChild(alert);
                            submitBtn.disabled = true;
                        } else {
                            submitBtn.disabled = false;
                        }
                    });

                function removeSlugAlert() {
                    const existing = document.getElementById('slug-alert');
                    if (existing) existing.remove();
                }
            });
        });
    </script>
@endpush
