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
    </style>
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin: 20px 0">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button"
                    role="tab" aria-controls="tab1" aria-selected="true">
                    Thông tin cá nhân
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button"
                    role="tab" aria-controls="tab2" aria-selected="false">
                    Địa chỉ giao hàng
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button"
                    role="tab" aria-controls="tab3" aria-selected="false">
                    Lịch sử đơn hàng
                </button>
            </li>
        </ul>

        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">

            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAddressModal">Thêm địa
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
                            <form method="POST" action="{{ route('address.delete', $address->id) }}">
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
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <h5>Lịch sử đơn hàng</h5>
                <p>Danh sách đơn hàng đã mua.</p>
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








@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const GHN_TOKEN = '2e8adeb0-1a81-11f0-9f4c-529f157d1a4f';

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
    </script>
@endpush
