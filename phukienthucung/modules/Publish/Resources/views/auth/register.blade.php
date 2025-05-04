@extends('publish::layouts.master') <!-- Layout của Publish module -->

@section('content')
    <div class="container">
        <h2>Đăng ký tài khoản</h2>

        <!-- Đưa thông báo lỗi nếu có -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Đơn giản form đăng ký -->
        <form action="{{ route('publish.register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Họ và Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Xác nhận mật khẩu:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
@endsection
