@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <h4 class="pt-4">Thông tin cá nhân</h4>

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

        <form method="POST" action="{{ route('admin.profile.update') }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Họ tên <span class="required">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                        required>
                    <div class="invalid-feedback">Vui lòng nhập họ tên.</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" readonly
                        value="{{ old('email', $user->email) }}" required>
                    <div class="invalid-feedback">Vui lòng nhập email hợp lệ.</div>
                </div>
            </div>

            @if ($user->employee)
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số điện thoại <span class="required">*</span></label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}"
                            required>
                        <div class="invalid-feedback">Vui lòng nhập số điện thoại.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ngày sinh</label>
                        <input type="date" name="birth_date" class="form-control"
                            value="{{ old('birth_date', $user->employee->birth_date) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">CCCD <span class="required">*</span></label>
                        <input type="text" name="cccd" class="form-control"
                            value="{{ old('cccd', $user->employee->cccd) }}" required>
                        <div class="invalid-feedback">Vui lòng nhập CCCD.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Giới tính</label>
                        <select name="gender" class="form-select">
                            <option value="">-- Chọn --</option>
                            <option value="Nam" {{ old('gender', $user->employee->gender) == 'Nam' ? 'selected' : '' }}>
                                Nam
                            </option>
                            <option value="Nữ" {{ old('gender', $user->employee->gender) == 'Nữ' ? 'selected' : '' }}>Nữ
                            </option>
                            <option value="Khác"
                                {{ old('gender', $user->employee->gender) == 'Khác' ? 'selected' : '' }}>Khác
                            </option>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn giới tính.</div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Mật khẩu mới</label>
                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Xác nhận mật khẩu mới">
                    <div class="invalid-feedback">Mật khẩu xác nhận không khớp.</div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.needs-validation');

            forms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    // Đồng bộ trạng thái cho tất cả input
                    form.classList.add('was-validated');

                    // Kiểm tra mật khẩu confirm
                    const password = form.querySelector('input[name="password"]');
                    const confirm = form.querySelector('input[name="password_confirmation"]');
                    if (password.value && password.value !== confirm.value) {
                        confirm.setCustomValidity('Mật khẩu xác nhận không khớp');
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        confirm.setCustomValidity('');
                    }

                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                }, false);
            });
        });
    </script>

@endsection
