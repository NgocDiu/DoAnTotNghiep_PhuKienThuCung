@extends('admin::layouts.auth')
@section('title', 'Đăng nhập')
@section('content')
    <div class="auth-main">
        <div class="auth-wrapper v3"
            style="background-image: url('{{ asset('modules/admin/images/authentication/adminbg.jpg') }}');
           background-size: cover;
           background-position: center;
           background-repeat: no-repeat;
           backdrop-filter: blur(1px);
           background-color: rgba(0, 0, 0, 0.4);">
            <div class="auth-form" style="justify-content:start !important">
                <div class="auth-header">
                    <a href="{{ route('admin.register') }}">
                        {{-- <img src="{{ asset('modules/admin/images/logo-dark.svg') }}"
                            alt="img"> --}}
                    </a>
                </div>
                <div class="card my-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-end mb-4">
                            <h3 class="mb-0"><b>Đăng nhập</b></h3>
                            <a href="{{ route('admin.register') }}" class="link-primary">Bạn chưa có tài khoản?</a>
                        </div>
                        <form action="{{ url('admin/login') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success" style="text-align: center">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Mật khẩu</label>
                                <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                            </div>



                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
