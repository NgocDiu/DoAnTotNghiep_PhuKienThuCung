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

        <form method="POST" action="{{ route('admin.profile.update') }}">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                        required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                </div>
            </div>

            @if ($user->employee)
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ngày sinh</label>
                        <input type="date" name="birth_date" class="form-control"
                            value="{{ old('birth_date', $user->employee->birth_date) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">CCCD</label>
                        <input type="text" name="cccd" class="form-control"
                            value="{{ old('cccd', $user->employee->cccd) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Giới tính</label>
                    <select name="gender" class="form-select">
                        <option value="">-- Chọn --</option>
                        <option value="Nam" {{ old('gender', $user->employee->gender) == 'Nam' ? 'selected' : '' }}>Nam
                        </option>
                        <option value="Nữ" {{ old('gender', $user->employee->gender) == 'Nữ' ? 'selected' : '' }}>Nữ
                        </option>
                        <option value="Khác" {{ old('gender', $user->employee->gender) == 'Khác' ? 'selected' : '' }}>
                            Khác</option>
                    </select>
                </div>
            @endif

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection
