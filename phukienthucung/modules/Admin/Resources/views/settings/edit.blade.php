@extends('admin::layouts.master')

@section('content')
    <div class="container mt-4">
        <h4>Cấu hình cửa hàng GHN</h4>

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

        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Tên cửa hàng</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $setting->name ?? '') }}"
                    required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Token</label>
                    <input type="text" name="token" class="form-control"
                        value="{{ old('token', $setting->token ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Shop ID</label>
                    <input type="number" name="shop_id" class="form-control"
                        value="{{ old('shop_id', $setting->shop_id ?? '') }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ old('phone', $setting->phone ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Địa chỉ cụ thể</label>
                    <input type="text" name="to_address" class="form-control"
                        value="{{ old('to_address', $setting->address ?? '') }}" disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tỉnh/Thành phố</label>
                    <select id="edit_province" name="province_id" class="form-select" required></select>
                    <input type="hidden" name="province_desc" id="edit_province_desc"
                        value="{{ old('province_desc', $setting->province_name ?? '') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Quận/Huyện</label>
                    <select id="edit_district" name="district_id" class="form-select" required></select>
                    <input type="hidden" name="district_desc" id="edit_district_desc"
                        value="{{ old('district_desc', $setting->district_name ?? '') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Phường/Xã</label>
                    <select id="edit_ward" name="ward_code" class="form-select" required></select>
                    <input type="hidden" name="ward_name" id="edit_ward_name"
                        value="{{ old('ward_name', $setting->ward_name ?? '') }}">
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        const GHN_TOKEN = "c59c15ca-30b3-11f0-a8f3-e2b76f821110";

        function fetchProvinces() {
            fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/province", {
                    method: 'GET',
                    headers: {
                        'Token': GHN_TOKEN
                    }
                })
                .then(res => res.json())
                .then(res => {
                    const select = document.getElementById('edit_province');
                    select.innerHTML = '<option value="">-- Chọn tỉnh/thành --</option>';
                    (res.data || []).forEach(p => {
                        const opt = document.createElement('option');
                        opt.value = p.ProvinceID;
                        opt.textContent = p.ProvinceName;
                        opt.dataset.name = p.ProvinceName;
                        if (p.ProvinceID == '{{ $setting->province_id }}') opt.selected = true;
                        select.appendChild(opt);
                    });
                    select.dispatchEvent(new Event('change'));
                });
        }

        document.getElementById('edit_province').addEventListener('change', function() {
            const provinceId = this.value;
            const provinceName = this.options[this.selectedIndex].textContent;
            document.getElementById('edit_province_desc').value = provinceName;
            const districtSelect = document.getElementById('edit_district');
            const wardSelect = document.getElementById('edit_ward');
            districtSelect.innerHTML = '<option value="">-- Chọn quận/huyện --</option>';
            wardSelect.innerHTML = '<option value="">-- Chọn phường/xã --</option>';
            document.getElementById('edit_district_desc').value = '';
            document.getElementById('edit_ward_name').value = '';

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
                        if (d.DistrictID == '{{ $setting->district_id }}') opt.selected = true;
                        districtSelect.appendChild(opt);
                    });
                    districtSelect.dispatchEvent(new Event('change'));
                });
        });

        document.getElementById('edit_district').addEventListener('change', function() {
            const districtId = this.value;
            const districtName = this.options[this.selectedIndex].textContent;
            document.getElementById('edit_district_desc').value = districtName;
            const wardSelect = document.getElementById('edit_ward');
            wardSelect.innerHTML = '<option value="">-- Chọn phường/xã --</option>';
            document.getElementById('edit_ward_name').value = '';

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
                        if (w.WardCode == '{{ $setting->ward_code }}') {
                            opt.selected = true;

                            // ✅ Gán luôn ward_name nếu có sẵn ward_code
                            document.getElementById('edit_ward_name').value = w.WardName;
                        }
                        wardSelect.appendChild(opt);
                    });
                });
        });

        document.getElementById('edit_ward').addEventListener('change', function() {
            document.getElementById('edit_ward_name').value = this.options[this.selectedIndex].textContent;
        });

        window.addEventListener('load', fetchProvinces);
    </script>
@endpush
