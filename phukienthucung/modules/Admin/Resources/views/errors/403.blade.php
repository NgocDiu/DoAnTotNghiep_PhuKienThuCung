@extends('admin::layouts.master')
@section('styles')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .error-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .error-code {
            font-size: 10rem;
            font-weight: bold;
            color: #dc3545;
        }

        .error-message {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .btn-home {
            margin-top: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="px-5">
        <div class="error-container text-center">
            <img src="{{ asset('modules/admin/images/403/403.jpg') }}" alt="">
            <h1 class="error-message">Bạn không có quyền truy cập trang này.</h1>
            <h4 class="my-5">Vui lòng liên hệ quản trị viên nếu bạn nghĩ đây là nhầm lẫn.</h4>
            <a href="{{ route('admin.index') }}" class="btn btn-primary btn-home">Quay về Trang Chủ</a>
        </div>
    </div>
@endsection
