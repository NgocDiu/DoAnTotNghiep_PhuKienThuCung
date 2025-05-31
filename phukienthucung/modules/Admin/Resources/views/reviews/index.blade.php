@extends('admin::layouts.master')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Danh sách đánh giá sản phẩm</h2>

        <table class="table table-bordered" id="product-reviews-table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượt đánh giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @php $grouped = $reviews->groupBy('product.id'); @endphp

                @foreach ($grouped as $productId => $group)
                    @php $product = $group->first()->product; @endphp
                    <tr>
                        <td>{{ $product->name ?? '[Không có tên]' }}</td>
                        <td>{{ $group->count() }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#reviewModal{{ $product->id }}">
                                Xem đánh giá
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

    {{-- Modal danh sách đánh giá --}}
    @foreach ($grouped as $productId => $group)
        @php $product = $group->first()->product; @endphp

        <div class="modal fade" id="reviewModal{{ $product->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Đánh giá sản phẩm: {{ $product->name }}</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped" id="reviews-table-{{ $product->id }}">
                            <thead>
                                <tr>
                                    <th>Người dùng</th>
                                    <th>Số sao</th>
                                    <th>Bình luận</th>
                                    <th>Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group as $review)
                                    <tr>
                                        <td>
                                            @if ($review->user)
                                                <button class="btn btn-link p-0" data-bs-toggle="modal"
                                                    data-bs-target="#userModal{{ $review->user->id }}">
                                                    {{ $review->user->name }}
                                                </button>
                                            @else
                                                [Ẩn danh]
                                            @endif
                                        </td>
                                        <td>{{ $review->rating }}</td>
                                        <td>{{ $review->comment }}</td>
                                        <td>{{ $review->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal người dùng --}}
        @foreach ($group as $review)
            @if ($review->user)
                <div class="modal fade" id="userModal{{ $review->user->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thông tin người dùng</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Họ tên:</strong> {{ $review->user->name }}</p>
                                <p><strong>Email:</strong> {{ $review->user->email }}</p>
                                <p><strong>Điện thoại:</strong> {{ $review->user->phone ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
@endsection

@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#product-reviews-table').DataTable({
                language: {
                    url: '{{ asset('modules/admin/datatable/i18n/vi.json') }}'
                },
                ordering: true,
                paging: true,
                searching: true
            });

            @foreach ($grouped as $productId => $group)
                $('#reviews-table-{{ $productId }}').DataTable({
                    language: {
                        url: '{{ asset('modules/admin/datatable/i18n/vi.json') }}'
                    },
                    paging: true,
                    ordering: true,
                    info: true
                });
            @endforeach
        });
    </script>
@endpush
