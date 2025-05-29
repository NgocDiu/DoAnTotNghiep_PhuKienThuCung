@extends('admin::layouts.master')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Lịch sử nhập kho</h2>

        <table id="importTable" class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Mã phiếu</th>
                    <th>Người tạo</th>
                    <th>Ngày nhập</th>
                    <th>Ghi chú</th>
                    <th>Tổng tiền</th>

                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($imports as $import)
                    @php
                        $totalPrice = $import->details->sum(fn($d) => $d->quantity * $d->unit_price);
                    @endphp
                    <tr>
                        <td>{{ $import->code }}</td>
                        <td>{{ $import->user->name }}</td>
                        <td>{{ $import->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ Str::limit($import->note, 50) ?: '' }}</td>
                        <td class="text-end text-danger fw-bold">
                            {{ number_format($totalPrice, 0) }} ₫
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#importModal{{ $import->id }}">
                                Xem chi tiết
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{-- Modal ngoài bảng --}}
        @foreach ($imports as $import)
            <div class="modal fade" id="importModal{{ $import->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Chi tiết phiếu nhập #{{ $import->code }}</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Người tạo:</strong> {{ $import->user->name }}</p>
                            <p><strong>Ghi chú:</strong> {{ $import->note ?: 'Không có' }}</p>

                            @php
                                $totalPrice = $import->details->sum(fn($d) => $d->quantity * $d->unit_price);
                            @endphp

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Sản phẩm</th>
                                        <th class="text-end">Số lượng</th>
                                        <th class="text-end">Đơn giá</th>
                                        <th class="text-end">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($import->details as $detail)
                                        @php
                                            $mainImage =
                                                $detail->product->images->firstWhere('is_main', true)?->image_url ??
                                                ($detail->product->images->first()?->image_url ??
                                                    'images/no-image.png');
                                            $lineTotal = $detail->quantity * $detail->unit_price;
                                        @endphp
                                        <tr>
                                            <td>
                                                <img src="{{ asset($mainImage) }}" alt="Ảnh sản phẩm" width="60"
                                                    height="60" style="object-fit: cover; border-radius: 6px;">
                                            </td>
                                            <td>{{ $detail->product->name }}</td>
                                            <td class="text-end">{{ $detail->quantity }}</td>
                                            <td class="text-end">{{ number_format($detail->unit_price, 0) }} ₫</td>
                                            <td class="text-end">{{ number_format($lineTotal, 0) }} ₫</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="fw-bold">
                                        <td colspan="4" class="text-end">Tổng cộng:</td>
                                        <td class="text-end text-danger">{{ number_format($totalPrice, 0) }} ₫</td>
                                    </tr>
                                </tfoot>
                            </table>
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
            $('#importTable').DataTable({
                language: {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
