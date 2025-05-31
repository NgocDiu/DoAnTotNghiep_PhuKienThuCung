@extends('publish::layouts.master')
@section('content')
    <div id="inner-wrap" class="wrap hfeed bt-clear">

        <section role="banner" class="entry-hero product-hero-section entry-hero-layout-standard" style="margin: 50px 0">
            <div class="entry-hero-container-inner">
                @if (session('success'))
                    <div class="alert alert-success" style="text-align: center">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="custom-alert-close"
                            onclick="this.parentElement.style.display='none';">&times;</button>
                    </div>
                @endif

                <div class="hero-section-overlay"></div>
                <div class="hero-container site-container">
                    <h1 class="text-center" style="padding-top: 20px">Đăng nhập</h1>
                    <form style="margin: 50px 300px;padding:30px 0;display: flex;flex-direction: column"
                        action="{{ route('publish.login') }}" method="POST">
                        @csrf
                        <input class="my-3" type="email" name="email" placeholder="Email" required>
                        <input class="my-3" type="password" name="password" placeholder="Mật khẩu" required>
                        <button class="my-3" type="submit">Đăng nhập</button>
                        <a style="text-align: end" href="/register">Bạn chưa có tài khoản?Đăng kí</a>

                    </form>
                    <!-- .entry-header -->
                </div>
            </div>
        </section>

    </div>
@endsection
