@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <div class="pt-4 d-flex flex-row justify-content-between">
            <h4>Danh sách thuộc tính</h4>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Thêm thuộc tính</button>
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

        <table id="attributesTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên thuộc tính</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attributes as $attribute)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attribute->name }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $attribute->id }}">Sửa</button>

                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $attribute->id }}">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Thêm -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('admin.attributes.store') }}" method="POST" class="modal-content needs-validation"
                novalidate>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Thêm thuộc tính</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tên thuộc tính <span class="required">*</span></label>
                        <input name="name" class="form-control" required>
                        <div class="invalid-feedback">Vui lòng nhập tên thuộc tính.</div>
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
    @foreach ($attributes as $attribute)
        <!-- Modal Sửa -->
        <div class="modal fade" id="editModal{{ $attribute->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST"
                    class="modal-content needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa thuộc tính</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tên thuộc tính <span class="required">*</span></label>
                            <input name="name" value="{{ $attribute->name }}" class="form-control" required>
                            <div class="invalid-feedback">Vui lòng nhập tên thuộc tính.</div>
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
        <div class="modal fade" id="deleteModal{{ $attribute->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST"
                    class="modal-content">
                    @csrf @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa thuộc tính</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa thuộc tính "<strong>{{ $attribute->name }}</strong>"?
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
            Array.from(forms).forEach((form) => {
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
            Array.from(forms).forEach((form) => {
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
            $('#attributesTable').DataTable({
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

                fetch("{{ route('admin.attributes.checkName') }}", {
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
                            alert.id = 'attribute-name-alert';
                            alert.className = 'text-danger mt-1';
                            alert.textContent = 'Tên thuộc tính đã tồn tại.';
                            nameInput.parentElement.appendChild(alert);
                            submitBtn.disabled = true;
                        } else {
                            submitBtn.disabled = false;
                        }
                    });

                function removeNameAlert() {
                    const alert = document.getElementById('attribute-name-alert');
                    if (alert) alert.remove();
                }
            });
        });
    </script>
@endpush
