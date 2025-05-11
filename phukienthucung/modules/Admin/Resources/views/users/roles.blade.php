@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <h1>Gán Vai trò cho Người dùng</h1>

        <table id="userRolesTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('admin.users.roles.update', $user) }}" method="POST">
                                @csrf
                                <select name="roles[]" class="form-select" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div style="display: flex;justify-content: end">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Lưu</button>

                                </div>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('modules/admin/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#userRolesTable').DataTable({
                "language": {
                    "url": "{{ asset('modules/admin/datatable/i18n/vi.json') }}" // nếu bạn có file tiếng Việt local
                }
            });
        });
    </script>
@endpush
