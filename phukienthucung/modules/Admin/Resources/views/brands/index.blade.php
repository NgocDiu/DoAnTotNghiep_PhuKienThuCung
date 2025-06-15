@extends('admin::layouts.master')

@section('content')
    <style>
        .required {
            color: red;
        }
    </style>
    <div class="container">
        <div class="pt-4 d-flex flex-row justify-content-between">
            <h4>Danh sách thương hiệu</h4>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Thêm thương hiệu</button>
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
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table id="brandsTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên thương hiệu</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->description }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning m-1" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $brand->id }}">Sửa</button>
                            <button class="btn btn-sm btn-danger m-1" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $brand->id }}">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Thêm -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('admin.brands.store') }}" method="POST" class="modal-content needs-validation"
                novalidate>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Thêm thương hiệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tên thương hiệu <span class="required">*</span></label>
                        <input name="name" class="form-control" required>
                        <div class="invalid-feedback">Vui lòng nhập tên thương hiệu.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>

        </div>
    </div>

    <!-- Modal Sửa & Xóa -->
    @foreach ($brands as $brand)
        <!-- Modal Sửa -->
        <div class="modal fade" id="editModal{{ $brand->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST"
                    class="modal-content needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Sửa thương hiệu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tên thương hiệu <span class="required">*</span></label>
                            <input name="name" value="{{ $brand->name }}" class="form-control" required>
                            <div class="invalid-feedback">Vui lòng nhập tên thương hiệu.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea name="description" class="form-control" rows="3">{{ $brand->description }}</textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Lưu</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>

            </div>
        </div>

        <!-- Modal Xóa -->
        <div class="modal fade" id="deleteModal{{ $brand->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" class="modal-content">
                    @csrf @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa thương hiệu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa thương hiệu "<strong>{{ $brand->name }}</strong>"?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger">Xóa</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
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

    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#brandsTable').DataTable({
                "language": {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.querySelector('#createModal input[name="name"]');
            const submitBtn = document.querySelector('#createModal button[type="submit"]');

            nameInput.addEventListener('input', function() {
                const name = nameInput.value.trim();
                if (!name) {
                    removeNameAlert();
                    submitBtn.disabled = true;
                    return;
                }

                fetch("{{ route('admin.brands.checkName') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            name: name
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        removeNameAlert();
                        if (data.exists) {
                            const alert = document.createElement('div');
                            alert.id = 'name-alert';
                            alert.className = 'text-danger mt-1';
                            alert.textContent = 'Tên thương hiệu đã tồn tại.';
                            nameInput.parentElement.appendChild(alert);
                            submitBtn.disabled = true;
                        } else {
                            submitBtn.disabled = false;
                        }
                    });

                function removeNameAlert() {
                    const alert = document.getElementById('name-alert');
                    if (alert) alert.remove();
                }
            });
        });
    </script>
@endpush
