@extends('admin.partials.master')
@session('title')
    Danh mục
@endsession
@section('content')
    <div class="m-2">
        <h1>Danh sách User </h1>
        <table class="table table-striped p-3 mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Emai</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->type }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('admin.users.edit', $user) }}">Sửa</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
       {{-- {{ $categories->link()}} --}}
    </div>
@endsection
