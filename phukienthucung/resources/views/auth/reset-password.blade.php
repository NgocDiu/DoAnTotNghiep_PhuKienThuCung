@extends('admin::layouts.auth')
@section('title', 'Đặt lại mật khẩu')
@section('content')
    <div class="auth-main">
        <div class="auth-wrapper v3"
            style="background-image: url('{{ asset('modules/admin/images/authentication/adminbg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; backdrop-filter: blur(1px); background-color: rgba(0, 0, 0, 0.4);">
            <div class="auth-form" style="justify-content:start !important">
                <div class="card my-5">
                    <div class="card-body">
                        <h3 class="mb-3"><b>Đặt lại mật khẩu</b></h3>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate>
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $email) }}"
                                    required>
                                <div class="invalid-feedback">Vui lòng nhập địa chỉ email hợp lệ.</div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Mật khẩu mới</label>
                                <input type="password" name="password" class="form-control" minlength="8" required>
                                <div class="invalid-feedback">Mật khẩu tối thiểu 8 ký tự.</div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Xác nhận mật khẩu</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                                <div class="invalid-feedback">Vui lòng xác nhận lại mật khẩu.</div>
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
                            </div>

                            <div class="mt-3 text-center">
                                <a href="{{ url()->previous() }}">Quay lại</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(function(form) {
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
