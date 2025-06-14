@extends('admin::layouts.master')

@section('content')
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->


        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard</h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="row">
                {{-- Tổng số khách hàng --}}
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Tổng số khách hàng</h6>
                            <h4 class="mb-3">
                                {{ number_format($totalCustomers) }}
                                <span
                                    class="badge {{ $customerGrowth >= 0 ? 'bg-light-primary border border-primary' : 'bg-light-danger border border-danger' }}">
                                    <i class="ti {{ $customerGrowth >= 0 ? 'ti-trending-up' : 'ti-trending-down' }}"></i>
                                    {{ abs($customerGrowth) }}%
                                </span>
                            </h4>
                            <p class="mb-0 text-muted text-sm">
                                So với tháng trước
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Tổng số nhân viên --}}
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Tổng số nhân viên</h6>
                            <h4 class="mb-3">
                                {{ number_format($totalStaff) }}
                                {{-- Nếu muốn có growth thì bạn cũng xử lý tương tự --}}
                                <span class="badge bg-light-secondary border border-secondary">
                                    <i class="ti ti-users"></i>
                                </span>
                            </h4>
                            <p class="mb-0 text-muted text-sm">
                                Tổng nhân sự hệ thống
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Tổng số đơn hàng --}}
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Tổng số đơn hàng</h6>
                            <h4 class="mb-3">
                                {{ number_format($totalOrders) }}
                                <span
                                    class="badge {{ $orderGrowth >= 0 ? 'bg-light-success border border-success' : 'bg-light-danger border border-danger' }}">
                                    <i class="ti {{ $orderGrowth >= 0 ? 'ti-trending-up' : 'ti-trending-down' }}"></i>
                                    {{ abs($orderGrowth) }}%
                                </span>
                            </h4>
                            <p class="mb-0 text-muted text-sm">
                                So với tháng trước
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Tổng số sản phẩm --}}
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Tổng số sản phẩm</h6>
                            <h4 class="mb-3">
                                {{ number_format($totalProducts) }}
                                <span class="badge bg-light-info border border-info">
                                    <i class="ti ti-package"></i>
                                </span>
                            </h4>
                            <p class="mb-0 text-muted text-sm">
                                Sản phẩm đang kinh doanh
                            </p>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card tbl-card">
                    <div class="card-header">
                        <h5>Đơn hàng gần đây</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Khách hàng</th>
                                        <th>Trạng thái</th>
                                        <th class="text-end">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentOrders as $order)
                                        @php
                                            $statusClass = match ($order->status) {
                                                'pending' => 'text-warning', // Chờ xác nhận
                                                'confirmed' => 'text-primary', // Đã xác nhận
                                                'shipping' => 'text-info', // Đang giao
                                                'delivered' => 'text-success', // Đã giao
                                                'cancelled' => 'text-danger', // Đã hủy
                                                'returned' => 'text-secondary', // Đã trả hàng
                                                default => 'text-muted',
                                            };

                                            $statusLabel = match ($order->status) {
                                                'pending' => 'Chờ xác nhận',
                                                'confirmed' => 'Đã xác nhận',
                                                'shipping' => 'Đang giao',
                                                'delivered' => 'Đã giao',
                                                'cancelled' => 'Đã hủy',
                                                'returned' => 'Đã trả hàng',
                                                default => ucfirst($order->status),
                                            };
                                        @endphp

                                        <tr>
                                            <td><a href="#" class="text-muted">{{ $order->id }}</a></td>
                                            <td>{{ $order->user->name ?? 'N/A' }}</td>
                                            <td>
                                                <span class="d-flex align-items-center gap-2">
                                                    <i class="fas fa-circle f-10 m-r-5 {{ $statusClass }}"></i>
                                                    {{ $statusLabel }}
                                                </span>
                                            </td>

                                            <td class="text-end">{{ number_format($order->grand_total) }}₫</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card tbl-card">
                    <div class="card-header">
                        <h5>Biểu đồ Doanh thu & Nhập hàng (6 tháng gần nhất)</h5>
                    </div>
                    <div class="card-body">
                        <div id="chart"></div>
                    </div>
                </div>

            </div>
        </div>





    </div>

    </div>
    </div>
@endsection
@push('scripts')
    <script>
        const months = @json($months);
        const revenueData = @json($revenueData);
        const importData = @json($importData);

        var options = {
            chart: {
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            colors: ['#28a745', '#ffc107'],
            series: [{
                    name: 'Doanh thu',
                    data: revenueData
                },
                {
                    name: 'Tiền nhập hàng',
                    data: importData
                }
            ],
            xaxis: {
                categories: months
            },
            tooltip: {
                y: {
                    formatter: val => val.toLocaleString('vi-VN') + ' ₫'
                }
            }
        };

        new ApexCharts(document.querySelector("#chart"), options).render();
    </script>
@endpush
