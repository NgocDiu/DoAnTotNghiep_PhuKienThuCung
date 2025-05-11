@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="pt-4 d-flex flex-row justify-content-between">
            <h3 class="mb-4">Danh sách menu</h3>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMenuModal">Thêm menu</button>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
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
                    <form action="{{ route('admin.menus.update', $menu) }}" method="POST" class="modal-content">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Sửa menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label>Loại menu</label>
                                <select name="type" class="form-select"
                                    onchange="toggleFields(this, {{ $menu->id }})">
                                    <option value="cate" {{ $menu->type == 'cate' ? 'selected' : '' }}>Danh mục</option>
                                    <option value="static" {{ $menu->type == 'static' ? 'selected' : '' }}>Tĩnh</option>
                                    <option value="page" {{ $menu->type == 'page' ? 'selected' : '' }}>Trang</option>
                                </select>
                            </div>
                            <div class="mb-2 cate-field-{{ $menu->id }}"
                                style="display: {{ $menu->type == 'cate' ? 'block' : 'none' }}">
                                <label>Danh mục</label>
                                <select name="category_id" class="form-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2 static-field-{{ $menu->id }}"
                                style="display: {{ in_array($menu->type, ['static', 'page']) ? 'block' : 'none' }}">
                                <label>Tiêu đề</label>
                                <input name="title" value="{{ $menu->title }}" class="form-control">
                                <label>URL</label>
                                <input name="url" value="{{ $menu->url }}" class="form-control">
                            </div>
                            <label>Vị trí</label>
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
                <form action="{{ route('admin.menus.store') }}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label>Loại menu</label>
                        <select name="type" class="form-select" onchange="toggleFields(this)">
                            <option value="cate">Danh mục</option>
                            <option value="static">Tĩnh</option>
                            <option value="page">Trang</option>
                        </select>
                        <div class="mt-2 cate-field">
                            <label>Danh mục</label>
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2 static-field" style="display:none">
                            <label>Tiêu đề</label>
                            <input name="title" class="form-control">
                            <label>URL</label>
                            <input name="url" class="form-control">
                        </div>
                        <label class="mt-2">Vị trí</label>
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
            if (id) {
                document.querySelector('.cate-field-' + id).style.display = (type === 'cate') ? 'block' : 'none';
                document.querySelector('.static-field-' + id).style.display = (type === 'static' || type === 'page') ?
                    'block' : 'none';
            } else {
                document.querySelector('.cate-field').style.display = (type === 'cate') ? 'block' : 'none';
                document.querySelector('.static-field').style.display = (type === 'static' || type === 'page') ? 'block' :
                    'none';
            }
        }
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
