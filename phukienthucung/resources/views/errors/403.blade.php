@extends('admin::layouts.master')

@section('content')
    <div class="container px-5">
        <div class="error-container text-center" style="display: flex;flex-direction: column;align-items: center">
            <h1 class="error-message mt-4">Bạn không có quyền truy cập trang này.</h1>
            <img src="{{ asset('modules/admin/images/403/403.jpg') }}" alt="">
            <a href="{{ route('publish.index') }}" class="btn btn-primary btn-home">Quay về Trang Chủ</a>
        </div>
    </div>
@endsection
