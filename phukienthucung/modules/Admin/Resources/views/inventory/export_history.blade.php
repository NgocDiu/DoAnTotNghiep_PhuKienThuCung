@extends('admin::layouts.master')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Lịch sử xuất kho (Đơn hàng)</h2>

        <table id="ordersTable" class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Khách hàng</th>
                    <th>Ngày đặt</th>
                    <th class="text-end">Tổng tiền</th>
                    <th class="text-center">Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td> {{-- Thay vì #ID --}}
                        <td>{{ $order->user->name ?? '---' }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-end text-danger">{{ number_format($order->grand_total, 0) }} ₫</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#orderModal{{ $order->id }}">
                                Xem chi tiết
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Modal đặt ngoài bảng --}}
        @foreach ($orders as $order)
            @if (in_array($order->status, ['cancelled', 'returned', 'pending']))
                @continue
            @endif
            <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Chi tiết đơn hàng {{ $order->id }}</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Khách hàng:</strong> {{ $order->user->name ?? '---' }}</p>
                            <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Sản phẩm</th>
                                        <th class="text-end">Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        @php
                                            $image =
                                                $item->product->images->firstWhere('is_main', true)?->image_url ??
                                                ($item->product->images->first()?->image_url ?? 'images/no-image.png');
                                        @endphp
                                        <tr>
                                            <td><img src="{{ asset($image) }}" width="60" height="60"
                                                    style="object-fit: cover; border-radius: 6px;"></td>
                                            <td>{{ $item->product->name }}</td>
                                            <td class="text-end">{{ $item->quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-end fw-bold mt-2">
                                Tổng tiền: <span class="text-danger">{{ number_format($order->grand_total, 0) }} ₫</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#ordersTable').DataTable({
                language: {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
