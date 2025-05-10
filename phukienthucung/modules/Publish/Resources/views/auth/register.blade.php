@extends('publish::layouts.master') <!-- Layout của Publish module -->

@section('content')
    <div id="inner-wrap" class="wrap hfeed bt-clear">
        <section role="banner" class="entry-hero product-hero-section entry-hero-layout-standard" style="margin: 50px 0">
            <div class="entry-hero-container-inner">
                <div class="hero-section-overlay"></div>
                <div class="hero-container site-container">
                    <h1 class="text-center" style="padding-top: 20px">Đăng ký</h1>

                    <!-- Hiển thị lỗi nếu có -->
                    @if ($errors->any())
                        <div class="alert alert-danger" style="margin: 20px 300px;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form style="margin: 50px 300px; padding:30px 0; display: flex; flex-direction: column"
                        action="{{ route('publish.register') }}" method="POST">
                        @csrf

                        <input class="my-3" type="text" name="name" placeholder="Họ và tên"
                            value="{{ old('name') }}" required>
                        <input class="my-3" type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                            required>
                        <input class="my-3" type="password" name="password" placeholder="Mật khẩu" required>
                        <input class="my-3" type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu"
                            required>

                        <button class="my-3" type="submit">Đăng ký</button>
                        <a style="text-align: end" href="/login">Bạn đã có tài khoản? Đăng nhập</a>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection
