@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="pt-4 d-flex flex-row justify-content-between">
            <h3 class="mb-4">Danh sách bài viết</h3>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">Thêm bài viết</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="articlesTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Slug</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Trạng thái</th>
                    <th>Nổi bật</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->slug }}</td>
                        <td>{{ $article->description }}</td>
                        <td><img src="{{ asset('storage/' . $article->image) }}" width="80"></td>
                        <td>{{ $article->is_active ? 'Hiện' : 'Ẩn' }}</td>
                        <td>{{ $article->is_outstanding ? 'Có' : 'Không' }}</td>
                        <td>
                            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteArticleModal{{ $article->id }}">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($articles as $article)
        <!-- Modal Delete -->
        <div class="modal fade" id="deleteArticleModal{{ $article->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="modal-content">
                    @csrf @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa bài viết</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc muốn xóa bài viết <strong>{{ $article->title }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger">Xóa</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#articlesTable').DataTable({
                "language": {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
