@extends('publish::layouts.2column')

@section('content')
    <style>
        /* Nav-tabs đẹp với màu đỏ chủ đạo #cd1818 */
        .nav-tabs .nav-link {
            color: #000;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }

        .nav-tabs .nav-link.active {
            color: #fff !important;
            background-color: #cd1818 !important;
            /* đỏ chủ đạo */
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .nav-tabs .nav-link:hover {
            color: #cd1818;
            background-color: #e9ecef;
        }

        .rating {
            direction: rtl;
            unicode-bidi: bidi-override;
            font-size: 1.5rem;
            display: inline-flex;
        }

        .rating input {
            display: none;
        }

        .rating label {
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s;
        }

        .rating input:checked~label,
        .rating label:hover,
        .rating label:hover~label {
            color: #ffc107;
        }
    </style>
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="custom-alert-close"
                    onclick="this.parentElement.style.display='none';">&times;</button>
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

        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin: 20px 0">
            <li class="nav-item mx-1" role="presentation">
                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button"
                    role="tab" aria-controls="tab1" aria-selected="true">
                    Đơn hàng của bạn
                </button>
            </li>
            <li class="nav-item mx-1" role="presentation">
                <button class="nav-link {{ request('tab') == 2 ? 'active' : '' }}" id="tab2-tab" data-bs-toggle="tab"
                    data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">
                    Địa chỉ giao hàng
                </button>
            </li>
            <li class="nav-item mx-1" role="presentation">
                <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button"
                    role="tab" aria-controls="tab3" aria-selected="false">
                    Thông tin cá nhân

                </button>
            </li>
        </ul>

        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <h5 class="mb-3">🧾 Lịch sử đơn hàng</h5>
                <p>Danh sách đơn hàng bạn đã đặt.</p>

                @php
                    $orders = getAllOrdersWithPayment();
                @endphp

                @if ($orders->isEmpty())
                    <div class="alert alert-warning">Bạn chưa có đơn hàng nào.</div>
                @else
                    <table class="table table-bordered table-hover mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>Mã đơn</th>
                                <th>Ngày đặt</th>
                                <th>Sản phẩm đầu tiên</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @php
                                    $payment = $order->payment;
                                    $firstItem = $order->items->first();
                                    $isUnpaidVnpay =
                                        $payment &&
                                        $payment->payment_method === 'vnpay' &&
                                        $payment->status !== 'success';
                                    $isCancel = $order->status == 'cancelled';
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>


                                    <td>
                                        @if ($firstItem)
                                            <a data-bs-toggle="collapse" href="#collapseOrderItems{{ $order->id }}"
                                                role="button" aria-expanded="false"
                                                aria-controls="collapseOrderItems{{ $order->id }}"
                                                style="color: #cd1818;text-decoration: none">
                                                {{ $firstItem->product->name }} x {{ $firstItem->quantity }}
                                            </a>

                                            <div class="collapse mt-2" id="collapseOrderItems{{ $order->id }}">
                                                <ul class="list-group">
                                                    @foreach ($order->items as $item)
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                            {{ $item->product->name }}
                                                            <span class="badge bg-primary rounded-pill">x
                                                                {{ $item->quantity }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>{{ number_format($order->grand_total) }} đ</td>
                                    <td>{{ strtoupper(optional($payment)->payment_method ?? '-') }}</td>
                                    <td>
                                        @if ($isCancel)
                                            <span class="badge bg-danger">Đã huỷ</span>
                                        @elseif ($isUnpaidVnpay)
                                            <span class="badge bg-danger mb-1">Chưa thanh toán</span>
                                        @else
                                            @switch($order->status)
                                                @case('pending')
                                                    <span class="badge bg-warning text-dark">Chờ xác nhận</span>
                                                @break

                                                @case('confirmed')
                                                    <span class="badge bg-success  text-white">Đã xác nhận</span>
                                                @break

                                                @case('shipping')
                                                    <span class="badge bg-info">Đang vận chuyển</span>
                                                @break

                                                @case('delivered')
                                                    <span class="badge bg-info">Đã giao hàng</span>
                                                @break

                                                @case('cancelled')
                                                    <span class="badge bg-danger">Đã huỷ</span>
                                                @break

                                                @case('returned')
                                                    <span class="badge bg-secondary">Trả hàng</span>
                                                @break

                                                @default
                                                    <span class="badge bg-secondary">Không xác định</span>
                                            @endswitch
                                        @endif
                                    </td>

                                    <td>

                                        @if ($isUnpaidVnpay && $order->status !== 'cancelled')
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown">
                                                    Tùy chọn
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="{{ route('checkout.vnpay.retry', $order) }}"
                                                            class="btn btn-sm btn-outline-danger m-1">
                                                            Thanh toán
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="text-start">
                                                            <button class="btn btn-outline-danger btn-sm m-1"
                                                                onclick="confirmCancelOrder('{{ route('orders.cancel', $order->id) }}')">
                                                                Hủy đơn hàng
                                                            </button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        @elseif ($order->status === 'delivered')
                                            <button type="button" class="btn btn-sm btn-outline-success"
                                                data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                                                Đánh giá
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                                                Xem chi tiết
                                            </button>
                                        @endif



                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1"
                                            aria-labelledby="orderModalLabel{{ $order->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="orderModalLabel{{ $order->id }}">
                                                            Đơn hàng {{ $order->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Ảnh</th> {{-- 🆕 --}}
                                                                    <th>Sản phẩm</th>
                                                                    <th>Số lượng</th>
                                                                    <th>Giá</th>
                                                                    <th>Tổng</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($order->items as $item)
                                                                    <tr>
                                                                        <td>
                                                                            <img src="{{ asset($item->product->images->firstWhere('is_main', 1)?->image_url ?? 'images/no-image.png') }}"
                                                                                style="width: 60px;height: 60px;">

                                                                        </td>
                                                                        <td>{{ $item->product->name }}</td>
                                                                        <td>{{ $item->quantity }}</td>
                                                                        <td>{{ number_format($item->price) }} đ</td>
                                                                        <td>{{ number_format($item->line_total) }} đ</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <div class="text-start ">
                                                            Địa chỉ:
                                                            @if (!empty($order->address->full_address))
                                                                {{ $order->address->full_address }}
                                                            @else
                                                                <span class="text-muted">Không có địa chỉ</span>
                                                            @endif
                                                        </div>
                                                        <div class="text-end fw-bold">
                                                            Tổng đơn: {{ number_format($order->grand_total) }} đ
                                                        </div>
                                                        {{-- Nếu đơn chưa xác nhận, hiển thị nút hủy --}}
                                                        @if ($order->status === 'pending')
                                                            <div class="text-end"> <button
                                                                    class="btn btn-outline-danger btn-sm"
                                                                    onclick="confirmCancelOrder('{{ route('orders.cancel', $order->id) }}')">
                                                                    Hủy đơn hàng
                                                                </button></div>
                                                        @endif
                                                        @if ($order->status === 'delivered')
                                                            @foreach ($order->items as $item)
                                                                @php
                                                                    $alreadyRated = \App\Models\ProductReview::where(
                                                                        'product_id',
                                                                        $item->product_id,
                                                                    )
                                                                        ->where('user_id', auth()->id())
                                                                        ->exists();
                                                                @endphp

                                                                @if (!$alreadyRated)
                                                                    <form action="{{ route('product-reviews.store') }}"
                                                                        method="POST" class="mb-3">
                                                                        @csrf
                                                                        <input type="hidden" name="product_id"
                                                                            value="{{ $item->product_id }}">

                                                                        <div class="d-flex align-items-center mb-1">
                                                                            <strong>{{ $item->product->name }}</strong>
                                                                        </div>

                                                                        <div class="mb-2">
                                                                            <div class="rating">
                                                                                @for ($i = 5; $i >= 1; $i--)
                                                                                    <input type="radio"
                                                                                        id="star{{ $i }}-{{ $item->product_id }}"
                                                                                        name="rating"
                                                                                        value="{{ $i }}"
                                                                                        required>
                                                                                    <label
                                                                                        for="star{{ $i }}-{{ $item->product_id }}"
                                                                                        title="{{ $i }} sao">★</label>
                                                                                @endfor
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-2">
                                                                            <label class="form-label">Nhận xét:</label>
                                                                            <textarea name="comment" class="form-control" rows="2" maxlength="1000" placeholder="Viết nhận xét..."
                                                                                required></textarea>
                                                                        </div>

                                                                        <div class="text-end">
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-success">Gửi
                                                                                đánh
                                                                                giá</button>
                                                                        </div>
                                                                    </form>
                                                                @else
                                                                    <div class="d-flex align-items-center mb-1">
                                                                        <strong>
                                                                            <i class="fa-solid fa-circle-check"
                                                                                style="color: #63E6BE;"></i>
                                                                            Sản phẩm {{ $item->product->name }} đã được
                                                                            đánh giá
                                                                        </strong>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="tab-pane fade {{ request('tab') == 2 ? 'show active' : '' }}" id="tab2" role="tabpanel"
                aria-labelledby="tab2-tab">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAddressModal">Thêm
                        địa
                        chỉ</button>
                </div>
                @foreach ($addresses as $address)
                    <div class="card mb-2">
                        <div class="card-body">
                            <strong>{{ $address->to_name }}</strong> | {{ $address->to_phone }}<br>
                            {{ $address->full_address }} <br>
                            @if ($address->is_default)
                                <span class="badge bg-success">Mặc định</span>
                            @endif
                            <div class="mt-2">
                                <button class="btn btn-sm btn-warning edit-address" data-id="{{ $address->id }}"
                                    data-name="{{ $address->to_name }}" data-phone="{{ $address->to_phone }}"
                                    data-address="{{ $address->to_address }}"
                                    data-province_id="{{ $address->to_province_id }}"
                                    data-district_id="{{ $address->to_district_id }}"
                                    data-ward_code="{{ $address->to_ward_code }}"
                                    data-is_default="{{ $address->is_default ? '1' : '0' }}"
                                    data-province_desc="{{ $address->province_desc }}"
                                    data-district_desc="{{ $address->district_desc }}"
                                    data-ward_desc="{{ $address->ward_desc }}" data-bs-toggle="modal"
                                    data-bs-target="#editAddressModal">
                                    Sửa
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteAddressModal{{ $address->id }}">
                                    Xóa
                                </button>

                            </div>
                        </div>
                    </div>
                    <!-- Modal Xóa -->
                    <div class="modal fade" id="deleteAddressModal{{ $address->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('address.delete', $address->id) }}?tab=2">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Xác nhận xóa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có chắc chắn muốn xóa địa chỉ này?</p>
                                        <p><strong>{{ $address->to_name }}</strong> | {{ $address->to_phone }}</p>
                                        <p>{{ $address->full_address }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="tab-pane fade {{ session('tab') === 'tab3' ? 'show active' : '' }}" id="tab3"
                role="tabpanel" aria-labelledby="tab3-tab">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Họ tên</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu mới (nếu đổi)</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>

                    </div>
                </form>
            </div>




        </div>




        <!-- Modal sửa -->
        <div class="modal fade" id="editAddressModal" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" id="editAddressForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Sửa địa chỉ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input name="to_name" id="edit_to_name" class="form-control mb-2" placeholder="Họ tên">
                            <input name="to_phone" id="edit_to_phone" class="form-control mb-2" placeholder="SĐT">
                            <input name="to_address" id="edit_to_address" class="form-control mb-2"
                                placeholder="Số nhà/ngõ...">

                            <input type="hidden" name="province_desc" id="edit_province_desc">
                            <input type="hidden" name="district_desc" id="edit_district_desc">
                            <input type="hidden" name="ward_desc" id="edit_ward_desc">

                            <select name="province_id" id="edit_province" class="form-select mb-2"></select>
                            <select name="district_id" id="edit_district" class="form-select mb-2"></select>
                            <select name="ward_code" id="edit_ward" class="form-select mb-2"></select>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="is_default" id="edit_is_default">
                                <label class="form-check-label" for="edit_is_default">Đặt làm mặc định</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Thêm -->
    <!-- Modal Thêm -->
    <div class="modal fade" id="addAddressModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('address.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm địa chỉ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input name="to_name" class="form-control mb-2" placeholder="Họ tên">
                        <input name="to_phone" class="form-control mb-2" placeholder="SĐT">
                        <input name="to_address" class="form-control mb-2" placeholder="Số nhà/ngõ...">

                        <select name="to_province_id" id="province" class="form-select mb-2">
                            <option value="">-- Tỉnh/Thành --</option>
                            @foreach ($provinces as $p)
                                <option value="{{ $p['ProvinceID'] }}" data-name="{{ $p['ProvinceName'] }}">
                                    {{ $p['ProvinceName'] }}
                                </option>
                            @endforeach
                        </select>

                        <select name="to_district_id" id="district" class="form-select mb-2"></select>
                        <select name="to_ward_code" id="ward" class="form-select mb-2"></select>

                        <input type="hidden" name="province_desc" id="province_desc">
                        <input type="hidden" name="district_desc" id="district_desc">
                        <input type="hidden" name="ward_desc" id="ward_desc">

                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_default" id="is_default">
                            <label class="form-check-label" for="is_default">
                                Đặt làm mặc định
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Lưu địa chỉ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <!-- Modal xác nhận hủy đơn -->
    <div class="modal fade" id="cancelOrderModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" id="cancelOrderForm">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xác nhận hủy đơn hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn hủy đơn hàng này?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger">Xác nhận hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //const GHN_TOKEN = '2e8adeb0-1a81-11f0-9f4c-529f157d1a4f';
            const GHN_TOKEN = 'c59c15ca-30b3-11f0-a8f3-e2b76f821110';

            // ===================== JS cho nút sửa =====================
            document.querySelectorAll('.edit-address').forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('edit_to_name').value = this.dataset.name;
                    document.getElementById('edit_to_phone').value = this.dataset.phone;
                    document.getElementById('edit_to_address').value = this.dataset.address;
                    document.getElementById('edit_province_desc').value = this.dataset
                        .province_desc;
                    document.getElementById('edit_district_desc').value = this.dataset
                        .district_desc;
                    document.getElementById('edit_ward_desc').value = this.dataset.ward_desc;
                    document.getElementById('edit_is_default').checked = this.dataset.is_default ===
                        '1';
                    const form = document.getElementById('editAddressForm');
                    form.action = `/information/address/update/${this.dataset.id}`;

                    fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/province", {
                            headers: {
                                'Token': GHN_TOKEN
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            const provinceSelect = document.getElementById('edit_province');
                            provinceSelect.innerHTML =
                                '<option value="">-- Tỉnh/Thành --</option>';
                            (res.data || []).forEach(p => {
                                const option = document.createElement('option');
                                option.value = p.ProvinceID;
                                option.textContent = p.ProvinceName;
                                option.selected = p.ProvinceID == button.dataset
                                    .province_id;
                                provinceSelect.appendChild(option);
                            });

                            if (button.dataset.province_id) loadDistricts(button.dataset
                                .province_id, button.dataset.district_id, button.dataset
                                .ward_code);
                        });

                    function loadDistricts(provinceId, selectedDistrict, selectedWard) {
                        fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/district", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Token': GHN_TOKEN
                                },
                                body: JSON.stringify({
                                    province_id: parseInt(provinceId)
                                })
                            })
                            .then(res => res.json())
                            .then(res => {
                                const districtSelect = document.getElementById('edit_district');
                                districtSelect.innerHTML =
                                    '<option value="">-- Quận/Huyện --</option>';
                                (res.data || []).forEach(d => {
                                    const option = document.createElement('option');
                                    option.value = d.DistrictID;
                                    option.textContent = d.DistrictName;
                                    option.selected = d.DistrictID == selectedDistrict;
                                    districtSelect.appendChild(option);
                                });

                                if (selectedDistrict) loadWards(selectedDistrict, selectedWard);
                            });
                    }

                    function loadWards(districtId, selectedWard) {
                        fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/ward", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Token': GHN_TOKEN
                                },
                                body: JSON.stringify({
                                    district_id: parseInt(districtId)
                                })
                            })
                            .then(res => res.json())
                            .then(res => {
                                const wardSelect = document.getElementById('edit_ward');
                                wardSelect.innerHTML =
                                    '<option value="">-- Phường/Xã --</option>';
                                (res.data || []).forEach(w => {
                                    const option = document.createElement('option');
                                    option.value = w.WardCode;
                                    option.textContent = w.WardName;
                                    option.selected = w.WardCode == selectedWard;
                                    wardSelect.appendChild(option);
                                });
                            });
                    }
                });
            });

            // ===================== JS cho form thêm =====================
            const province = document.querySelector('#addAddressModal #province');
            const district = document.querySelector('#addAddressModal #district');
            const ward = document.querySelector('#addAddressModal #ward');
            const provinceDesc = document.getElementById('province_desc');
            const districtDesc = document.getElementById('district_desc');
            const wardDesc = document.getElementById('ward_desc');

            if (province && district && ward) {
                province.addEventListener('change', function() {
                    const provinceId = this.value;
                    const name = this.options[this.selectedIndex].dataset.name;
                    provinceDesc.value = name;
                    districtDesc.value = '';
                    wardDesc.value = '';

                    district.innerHTML = '<option value="">-- Quận/Huyện --</option>';
                    ward.innerHTML = '<option value="">-- Phường/Xã --</option>';

                    fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/district", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Token': GHN_TOKEN
                            },
                            body: JSON.stringify({
                                province_id: parseInt(provinceId)
                            })
                        })
                        .then(res => res.json())
                        .then(res => {
                            (res.data || []).forEach(d => {
                                const opt = document.createElement('option');
                                opt.value = d.DistrictID;
                                opt.textContent = d.DistrictName;
                                opt.dataset.name = d.DistrictName;
                                district.appendChild(opt);
                            });
                        });
                });

                district.addEventListener('change', function() {
                    const districtId = this.value;
                    const name = this.options[this.selectedIndex].dataset.name;
                    districtDesc.value = name;
                    wardDesc.value = '';

                    ward.innerHTML = '<option value="">-- Phường/Xã --</option>';

                    fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/ward", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Token': GHN_TOKEN
                            },
                            body: JSON.stringify({
                                district_id: parseInt(districtId)
                            })
                        })
                        .then(res => res.json())
                        .then(res => {
                            (res.data || []).forEach(w => {
                                const opt = document.createElement('option');
                                opt.value = w.WardCode;
                                opt.textContent = w.WardName;
                                opt.dataset.name = w.WardName;
                                ward.appendChild(opt);
                            });
                        });
                });

                ward.addEventListener('change', function() {
                    const name = this.options[this.selectedIndex].dataset.name;
                    wardDesc.value = name;
                });
            }

            // ===================== JS cho select sửa thay đổi =====================
            document.getElementById('edit_province').addEventListener('change', function() {
                const provinceId = this.value;
                const provinceName = this.options[this.selectedIndex].textContent;
                document.getElementById('edit_province_desc').value = provinceName;

                // ✅ Load lại district khi đổi province
                const districtSelect = document.getElementById('edit_district');
                const wardSelect = document.getElementById('edit_ward');
                districtSelect.innerHTML = '<option value="">-- Quận/Huyện --</option>';
                wardSelect.innerHTML = '<option value="">-- Phường/Xã --</option>';
                document.getElementById('edit_district_desc').value = '';
                document.getElementById('edit_ward_desc').value = '';

                if (provinceId) {
                    fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/district", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Token': GHN_TOKEN
                            },
                            body: JSON.stringify({
                                province_id: parseInt(provinceId)
                            })
                        })
                        .then(res => res.json())
                        .then(res => {
                            (res.data || []).forEach(d => {
                                const opt = document.createElement('option');
                                opt.value = d.DistrictID;
                                opt.textContent = d.DistrictName;
                                opt.dataset.name = d.DistrictName;
                                districtSelect.appendChild(opt);
                            });
                        });
                }
            });

            document.getElementById('edit_district').addEventListener('change', function() {
                const districtId = this.value;
                const name = this.options[this.selectedIndex].textContent;
                document.getElementById('edit_district_desc').value = name;

                const wardSelect = document.getElementById('edit_ward');
                wardSelect.innerHTML = '<option value="">-- Phường/Xã --</option>';
                document.getElementById('edit_ward_desc').value = '';

                if (districtId) {
                    fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/ward", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Token': GHN_TOKEN
                            },
                            body: JSON.stringify({
                                district_id: parseInt(districtId)
                            })
                        })
                        .then(res => res.json())
                        .then(res => {
                            (res.data || []).forEach(w => {
                                const opt = document.createElement('option');
                                opt.value = w.WardCode;
                                opt.textContent = w.WardName;
                                opt.dataset.name = w.WardName;
                                wardSelect.appendChild(opt);
                            });
                        });
                }
            });

            document.getElementById('edit_ward').addEventListener('change', function() {
                document.getElementById('edit_ward_desc').value = this.options[this.selectedIndex]
                    .textContent;
            });
        });

        function confirmCancelOrder(url) {
            const form = document.getElementById('cancelOrderForm');
            form.action = url;
            new bootstrap.Modal(document.getElementById('cancelOrderModal')).show();
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const activeTab = '{{ session('tab') }}';
            if (activeTab) {
                const tabTrigger = document.querySelector(`[data-bs-target="#${activeTab}"]`);
                if (tabTrigger) new bootstrap.Tab(tabTrigger).show();
            }
        });
    </script>
@endpush
