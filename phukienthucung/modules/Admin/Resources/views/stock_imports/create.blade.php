@extends('admin::layouts.master')

@section('content')
    <div class="container ">
        <h4 class="pt-4">Thêm đơn nhập hàng</h4>
        <form action="{{ route('stock_imports.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="note" class="form-label">Ghi chú</label>
                <input type="text" name="note" class="form-control" value="{{ old('note') }}">
            </div>

            <button type="submit" class="btn btn-primary">Tạo đơn nhập</button>
        </form>
    </div>
@endsection
