@extends('admin::layouts.master')

@section('content')
    <div class="container py-4">
        <h2 class="mb-3">Danh sách mã khuyến mãi</h2>
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
        <div class="text-end">
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Thêm mới</button>
        </div>


        <table id="promotions" class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Loại</th>
                    <th>Giá trị</th>
                    <th>Hạn dùng</th>
                    <th>Giới hạn</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promotions as $promotion)
                    <tr>
                        <td>{{ $promotion->code }}</td>
                        <td>{{ $promotion->discount_type }}</td>
                        <td>{{ $promotion->discount_value }}</td>
                        <td>
                            {{ \Illuminate\Support\Str::of($promotion->start_date)->limit(10, '') }}
                            đến
                            {{ \Illuminate\Support\Str::of($promotion->end_date)->limit(10, '') }}
                        </td>
                        <td>{{ $promotion->usage_limit ?? 'Không giới hạn' }}</td>
                        <td>
                            @if ($promotion->is_active)
                                <span class="badge bg-success">Kích hoạt</span>
                            @else
                                <span class="badge bg-secondary">Chưa kích hoạt</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $promotion->id }}">Sửa</button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $promotion->id }}">Xóa</button>
                        </td>
                    </tr>

                    <!-- Modal sửa -->
                    <div class="modal fade" id="editModal{{ $promotion->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('admin.promotions.update', $promotion->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Chỉnh sửa mã khuyến mãi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Mã <span class="required">*</span></label>
                                            <input name="code" class="form-control" value="{{ $promotion->code }}"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mô tả</label>
                                            <textarea name="description" class="form-control">{{ $promotion->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Loại giảm <span class="required">*</span></label>
                                            <select name="discount_type" class="form-select" required>
                                                <option value="percent"
                                                    {{ $promotion->discount_type == 'percent' ? 'selected' : '' }}>%
                                                </option>
                                                <option value="amount"
                                                    {{ $promotion->discount_type == 'amount' ? 'selected' : '' }}>VND
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Giá trị <span class="required">*</span></label>
                                            <input type="number" name="discount_value" class="form-control"
                                                value="{{ $promotion->discount_value }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ngày bắt đầu <span class="required">*</span></label>
                                            <input type="date" name="start_date" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($promotion->start_date)->format('Y-m-d') }}"
                                                required>


                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ngày kết thúc <span class="required">*</span></label>
                                            <input type="date" name="end_date" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($promotion->end_date)->format('Y-m-d') }}"
                                                required>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Số lượt sử dụng <span
                                                    class="required">*</span></label>
                                            <input type="number" name="usage_limit" class="form-control"
                                                value="{{ $promotion->usage_limit }}" required>
                                        </div>
                                        <input type="hidden" name="is_active" value="0">

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                                {{ $promotion->is_active ? 'checked' : '' }}>
                                            <label class="form-check-label">Kích hoạt</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Hủy</button>
                                        <button class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal xóa -->
                    <div class="modal fade" id="deleteModal{{ $promotion->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('admin.promotions.destroy', $promotion->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $promotion->id }}">Xác nhận xoá
                                            mã khuyến mãi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Đóng"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa mã khuyến mãi <strong>{{ $promotion->code }}</strong>?
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
            </tbody>
        </table>

        {{ $promotions->links() }}
    </div>

    <!-- Modal thêm -->
    <!-- Thêm mã khuyến mãi Modal -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.promotions.store') }}" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm mã khuyến mãi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Mã <span class="required">*</span></label>
                            <input name="code" class="form-control" required>
                            <div class="invalid-feedback">Vui lòng nhập mã khuyến mãi.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Loại giảm <span class="required">*</span></label>
                            <select name="discount_type" class="form-select" required>
                                <option value="">-- Chọn loại giảm --</option>
                                <option value="percent">%</option>
                                <option value="amount">VND</option>
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn loại giảm.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Giá trị <span class="required">*</span></label>
                            <input type="number" name="discount_value" class="form-control" required>
                            <div class="invalid-feedback">Vui lòng nhập giá trị giảm.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ngày bắt đầu <span class="required">*</span></label>
                            <input type="date" name="start_date" class="form-control" required>
                            <div class="invalid-feedback">Vui lòng chọn ngày bắt đầu.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ngày kết thúc <span class="required">*</span></label>
                            <input type="date" name="end_date" class="form-control" required>
                            <div class="invalid-feedback">Vui lòng chọn ngày kết thúc.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số lượt sử dụng <span class="required">*</span></label>
                            <input type="number" name="usage_limit" class="form-control" required>
                            <div class="invalid-feedback">Vui lòng nhập số lượt sử dụng.</div>
                        </div>

                        <div class="form-check mb-3">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1">
                            <label class="form-check-label">Kích hoạt</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button class="btn btn-primary">Tạo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Validate JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach((form, index) => {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    </script>

@endsection

@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#promotions').DataTable({
                "language": {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
