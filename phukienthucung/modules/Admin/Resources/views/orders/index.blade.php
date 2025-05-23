@extends('admin::layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="pt-4 d-flex flex-row justify-content-between">
            <h4>Danh sách đơn hàng</h4>
        </div>

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

        <table id="ordersTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Trạng thái</th>
                    <th>Phương thức</th> <!-- Giữ lại -->
                    <th>Tổng tiền</th>
                    <th>Ngày đặt</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->user->name ?? 'Khách hàng' }}</td>
                        <td>
                            @php
                                $status = $order->status;
                                $payment = $order->payment;
                                $paymentMethod = $payment->payment_method ?? '';
                                $paymentStatus = $payment->status ?? '';
                            @endphp

                            @if ($paymentMethod === 'vnpay' && $paymentStatus === 'waiting')
                                <span class="badge bg-danger">Chưa thanh toán (VNPAY)</span>
                            @else
                                @switch($status)
                                    @case('pending')
                                        <span class="badge bg-warning">Chờ xác nhận</span>
                                    @break

                                    @case('confirmed')
                                        <span class="badge bg-info">Đã xác nhận</span>
                                    @break

                                    @case('shipping')
                                        <span class="badge bg-info">Đang giao</span>
                                    @break

                                    @case('delivered')
                                        <span class="badge bg-success">Đã giao</span>
                                    @break

                                    @case('cancelled')
                                        <span class="badge bg-danger">Đã hủy</span>
                                    @break

                                    @case('returned')
                                        <span class="badge bg-danger">Trả hàng</span>
                                    @break

                                    @default
                                        <span class="badge bg-light text-dark">Không rõ</span>
                                @endswitch
                            @endif
                        </td>
                        <td>{{ strtoupper($paymentMethod ?: 'N/A') }}</td>
                        <td>{{ number_format($order->grand_total ?? $order->total_amount + $order->ship_fee) }} đ</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        @php
                            $nextStatuses = match ($order->status) {
                                'confirmed' => ['shipping' => 'Đang giao'],
                                'shipping' => ['delivered' => 'Đã giao', 'returned' => 'Trả hàng'],
                                default => [],
                            };
                        @endphp

                        <td class="" style="gap: 4px; position: relative;">
                            {{-- Nút tạo đơn GHN nếu đang chờ xác nhận và không vnpay chờ thanh toán --}}
                            @if ($order->status === 'pending' && !($paymentMethod === 'vnpay' && $paymentStatus === 'waiting'))
                                <button class="btn btn-sm btn-warning"
                                    onclick='showConfirmModal("{{ route('admin.orders.ghn.create', $order->id) }}", "Bạn có chắc muốn tạo đơn GHN?", "POST")'>
                                    Tạo đơn GHN
                                </button>
                            @endif


                            {{-- Các nút chuyển trạng thái --}}
                            @foreach ($nextStatuses as $next => $label)
                                <button class="btn btn-sm btn-warning"
                                    onclick='showConfirmModal("{{ route('admin.orders.change-status', $order->id) }}?status={{ $next }}", "Bạn có chắc muốn chuyển trạng thái sang {{ $label }}?")'>
                                    {{ $label }}
                                </button>
                            @endforeach


                            {{-- Nút xem chi tiết --}}
                            <button class="btn btn-sm btn-info" style="position: absolute; right: 3px;bottom: 25%"
                                data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                                Xem chi tiết
                            </button>
                        </td>



                    </tr>
                @endforeach
            </tbody>
        </table>



        @foreach ($orders as $order)
            <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Chi tiết đơn hàng {{ $order->id }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Khách hàng:</strong> {{ $order->user->name ?? 'Ẩn' }}</p>
                            <p><strong>Điên thoại:</strong> {{ $order->address->to_phone ?? 'Không có' }}</p>
                            <p><strong>Địa chỉ:</strong> {{ $order->address->full_address ?? 'Không có' }}</p>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Ảnh</th> <!-- Thêm cột ảnh -->
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        @php
                                            $mainImage =
                                                $item->product->images->firstWhere('is_main', true)?->image_url ??
                                                ($item->product->images->first()?->image_url ?? 'images/no-image.png');
                                        @endphp
                                        <tr>
                                            <td>
                                                <img src="{{ asset($mainImage) }}" alt="Ảnh sản phẩm" width="60"
                                                    height="60" style="object-fit: cover;">
                                            </td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ number_format($item->price) }} đ</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->line_total) }} đ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="text-end">
                                <p><strong>Tiền hàng:</strong> {{ number_format($order->total_amount) }} đ</p>
                                <p><strong>Phí vận chuyển:</strong> {{ number_format($order->ship_fee) }} đ</p>
                                <p><strong>Tổng thanh toán:</strong>
                                    <span class="text-danger">
                                        {{ number_format($order->grand_total ?? $order->total_amount + $order->ship_fee) }}
                                        đ
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="confirmActionModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" id="confirmActionForm">
                @csrf @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xác nhận hành động</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p id="confirmActionText">Bạn có chắc muốn thực hiện hành động này?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#ordersTable').DataTable({
                language: {
                    url: "{{ asset('modules/admin/datatable/i18n/vi.json') }}"
                }
            });
        });

        function showConfirmModal(actionUrl, message, method = 'PUT') {
            const form = document.getElementById('confirmActionForm');
            form.action = actionUrl;

            // Cập nhật method override
            const methodInput = form.querySelector('input[name="_method"]');
            if (methodInput) methodInput.value = method;

            document.getElementById('confirmActionText').innerText = message;
            const modal = new bootstrap.Modal(document.getElementById('confirmActionModal'));
            modal.show();
        }
    </script>
@endpush
