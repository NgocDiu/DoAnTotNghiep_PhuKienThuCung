@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <h4 class="pt-3">Quản lý giảm giá sản phẩm</h4>

        @if (session('success'))
            <div class="alert
            alert-success">{{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá gốc</th>
                    <th>Giá giảm</th>
                    <th>Giảm giá?</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $pro)
                    <tr>
                        <form method="POST" action="{{ route('admin.products.updateDiscount', $pro->id) }}">
                            @csrf
                            <td>{{ $pro->name }}</td>
                            <td>{{ number_format($pro->price) }}₫</td>
                            <td>
                                <input name="discount_price" type="number" step="0.01" value="{{ $pro->discount_price }}"
                                    class="form-control" placeholder="Giá giảm...">
                            </td>
                            <td>
                                <input type="checkbox" name="is_discount" value="1"
                                    {{ $pro->is_discount ? 'checked' : '' }}>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary">Lưu</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">{{ $products->links() }}</div>
    </div>
@endsection
