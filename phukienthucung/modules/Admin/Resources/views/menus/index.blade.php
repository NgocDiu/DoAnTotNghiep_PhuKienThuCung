@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="pt-4 d-flex flex-row justify-content-between">
            <h3 class="mb-4">Danh sách menu</h3>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMenuModal">Thêm menu</button>
        </div>
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

        <table id="menusTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Loại</th>
                    <th>Tiêu đề</th>
                    <th>URL</th>
                    <th>Vị trí</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->type }}</td>
                        <td>{{ $menu->title }}</td>
                        <td>{{ $menu->url }}</td>
                        <td>{{ $menu->position }}</td>
                        <td>{{ $menu->is_active ? 'Hiện' : 'Ẩn' }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editMenuModal{{ $menu->id }}">Sửa</button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteMenuModal{{ $menu->id }}">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @foreach ($menus as $menu)
            <div class="modal fade" id="editMenuModal{{ $menu->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('admin.menus.update', $menu) }}" method="POST"
                        class="modal-content needs-validation" novalidate>
                        @csrf @method('PUT')

                        <div class="modal-header">
                            <h5 class="modal-title">Sửa menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <label class="form-label">Loại menu <span class="required">*</span></label>
                            <select name="type" class="form-select" onchange="toggleFields(this, {{ $menu->id }})"
                                required>
                                <option value="">-- Chọn loại menu --</option>
                                <option value="cate" {{ $menu->type == 'cate' ? 'selected' : '' }}>Danh mục</option>
                                <option value="static" {{ $menu->type == 'static' ? 'selected' : '' }}>Tĩnh</option>
                                <option value="page" {{ $menu->type == 'page' ? 'selected' : '' }}>Trang</option>
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn loại menu.</div>

                            <div class="mt-2 cate-field-{{ $menu->id }}"
                                style="display: {{ $menu->type == 'cate' ? 'block' : 'none' }}">
                                <label class="form-label">Danh mục <span class="required">*</span></label>
                                <select name="category_id" class="form-select"
                                    {{ $menu->type == 'cate' ? 'required' : '' }}>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Vui lòng chọn danh mục.</div>
                            </div>

                            <div class="mt-2 static-field-{{ $menu->id }}"
                                style="display: {{ in_array($menu->type, ['static', 'page']) ? 'block' : 'none' }}">
                                <label class="form-label">Tiêu đề <span class="required">*</span></label>
                                <input name="title" value="{{ $menu->title }}" class="form-control"
                                    {{ in_array($menu->type, ['static', 'page']) ? 'required' : '' }}>
                                <div class="invalid-feedback">Vui lòng nhập tiêu đề.</div>

                                <label class="form-label mt-2">URL <span class="required">*</span></label>
                                <input name="url" value="{{ $menu->url }}" class="form-control"
                                    {{ in_array($menu->type, ['static', 'page']) ? 'required' : '' }}>
                                <div class="invalid-feedback">Vui lòng nhập URL.</div>
                            </div>

                            <label class="form-label mt-2">Vị trí</label>
                            <input name="position" type="number" value="{{ $menu->position }}" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="modal fade" id="deleteMenuModal{{ $menu->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" class="modal-content">
                        @csrf @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title">Xóa menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc muốn xóa menu <strong>{{ $menu->title }}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger">Xóa</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="modal fade" id="addMenuModal" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('admin.menus.store') }}" method="POST" class="modal-content needs-validation"
                    novalidate>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <label class="form-label">Loại menu <span class="required">*</span></label>
                        <select name="type" class="form-select" onchange="toggleFields(this)" required>
                            <option value="">-- Chọn loại menu --</option>
                            <option value="cate">Danh mục</option>
                            <option value="static">Tĩnh</option>
                            <option value="page">Trang</option>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn loại menu.</div>

                        <div class="mt-2 cate-field">
                            <label class="form-label">Danh mục <span class="required">*</span></label>
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn danh mục.</div>
                        </div>

                        <div class="mt-2 static-field" style="display:none">
                            <label class="form-label">Tiêu đề <span class="required">*</span></label>
                            <input name="title" class="form-control">
                            <div class="invalid-feedback">Vui lòng nhập tiêu đề.</div>

                            <label class="form-label mt-2">URL <span class="required">*</span></label>
                            <input name="url" class="form-control">
                            <div class="invalid-feedback">Vui lòng nhập URL.</div>
                        </div>

                        <label class="form-label mt-2">Vị trí</label>
                        <input name="position" type="number" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function toggleFields(select, id = null) {
            const type = select.value;

            const cateField = id ? document.querySelector('.cate-field-' + id) : document.querySelector('.cate-field');
            const staticField = id ? document.querySelector('.static-field-' + id) : document.querySelector(
                '.static-field');

            if (!cateField || !staticField) return;

            if (type === 'static' || type === 'page') {
                cateField.style.display = 'none';
                staticField.style.display = 'block';
                staticField.querySelector('[name="title"]').setAttribute('required', 'required');
                staticField.querySelector('[name="url"]').setAttribute('required', 'required');

                if (cateField.querySelector('[name="category_id"]')) {
                    cateField.querySelector('[name="category_id"]').removeAttribute('required');
                }
            } else {
                cateField.style.display = 'block';
                staticField.style.display = 'none';
                cateField.querySelector('[name="category_id"]').setAttribute('required', 'required');

                if (staticField.querySelector('[name="title"]')) {
                    staticField.querySelector('[name="title"]').removeAttribute('required');
                }
                if (staticField.querySelector('[name="url"]')) {
                    staticField.querySelector('[name="url"]').removeAttribute('required');
                }
            }
        }

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


@endsection

@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#menusTable').DataTable({
                "language": {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
