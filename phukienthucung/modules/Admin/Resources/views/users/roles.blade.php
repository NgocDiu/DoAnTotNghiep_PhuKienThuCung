@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <h1>Gán Vai trò cho Người dùng</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Hành động</th>
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
                                <button type="submit" class="btn btn-primary btn-sm mt-2">Lưu</button>
                            </form>
                        </td>
                        <td>
                            {{-- Xử lý thêm nếu cần --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
