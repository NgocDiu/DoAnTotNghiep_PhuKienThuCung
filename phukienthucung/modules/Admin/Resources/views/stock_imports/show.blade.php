@extends('admin::layouts.master')

@section('content')
    <div class="container py-4">

        <h2 class="mb-4"> Chi tiết phiếu nhập <span class="text-primary">#{{ $import->code }}</span></h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">👤 Người tạo:</label>
                <span class="">{{ $import->user->name }}</span>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold"> Trạng thái:</label>
                <span>
                    @if ($import->status == 'pending')
                        <span class="badge bg-warning text-dark">Chờ xác nhận</span>
                    @elseif ($import->status == 'confirmed')
                        <span class="badge bg-success">Đã xác nhận</span>
                    @else
                        <span class="badge bg-danger">Đã xóa</span>
                    @endif
                </span>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Ghi chú:</label>
            <div class="">{{ $import->note ?: 'Không có ghi chú.' }}</div>
        </div>

        <h5 class="fw-bold mb-3"> Danh sách sản phẩm</h5>
        <div class="table-responsive mb-4">
            <table class="table table-bordered align-middle table-hover">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá nhập (₫)</th>
                        <th>Thành tiền (₫)</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($import->details as $detail)
                        @php
                            $lineTotal = $detail->quantity * $detail->unit_price;
                            $total += $lineTotal;
                        @endphp
                        <tr>
                            <td>{{ $detail->product->name }}</td>
                            <td class="text-center">{{ $detail->quantity }}</td>
                            <td class="text-end">{{ number_format($detail->unit_price, 0) }}</td>
                            <td class="text-end">{{ number_format($lineTotal, 0) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="fw-bold">
                        <td colspan="3" class="text-end">Tổng cộng:</td>
                        <td class="text-end text-danger">{{ number_format($total, 0) }} ₫</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.stock_imports.index') }}" class="btn btn-outline-secondary">
                Quay lại
            </a>

            @if ($import->status === 'pending')
                <!-- Nút mở modal -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">
                    Xác nhận phiếu nhập
                </button>

                <!-- Modal -->
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('admin.stock_imports.confirm', $import->id) }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmModalLabel">Xác nhận phiếu nhập</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Đóng"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn xác nhận phiếu nhập <strong>#{{ $import->code }}</strong> không?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
