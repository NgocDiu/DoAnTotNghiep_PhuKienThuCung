@extends('admin::layouts.auth')
@section('title', 'Quên mật khẩu')
@section('content')
    <div class="auth-main">
        <div class="auth-wrapper v3"
            style="background-image: url('{{ asset('modules/admin/images/authentication/adminbg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; backdrop-filter: blur(1px); background-color: rgba(0, 0, 0, 0.4);">
            <div class="auth-form" style="justify-content:start !important">
                <div class="card my-5">
                    <div class="card-body">
                        <h3 class="mb-3"><b>Quên mật khẩu</b></h3>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn"
                                    required>
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Gửi liên kết đặt lại mật khẩu</button>
                            </div>

                            <div class="mt-3 text-center">
                                <a href="{{ route('publish.login') }}">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
