@extends('admin::layouts.auth')
@section('title', 'Đăng kí')
@section('content')

    <div class="auth-main">

        <div class="auth-wrapper v3"
            style="background-image: url('{{ asset('modules/admin/images/authentication/adminbg.jpg') }}');
           background-size: cover;
           background-position: center;
           background-repeat: no-repeat;
           backdrop-filter: blur(1px);
           background-color: rgba(0, 0, 0, 0.4);">
            <div class="auth-form">

                <div class="card my-5">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-end mb-4">
                            <h3 class="mb-0"><b>Đăng ký</b></h3>
                            <a href="{{ route('admin.login') }}" class="link-primary">Bạn đã có tài khoản?</a>
                        </div>
                        <form action="{{ route('admin.register') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="form-label">Họ Tên</label>
                                <input name="name" type="text" class="form-control" placeholder="Họ Tên">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Mật khẩu:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password_confirmation">Xác nhận mật khẩu:</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required>
                            </div>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
