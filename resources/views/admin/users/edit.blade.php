@extends('admin.partials.master')
@session('title')
    Sửa danh mục
@endsession
@section('content')
    <div class="m-2">
        <h1>Sửa chức năng</h1>
        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Chức năng</label>
                <select name="type" id="" class="form-select">
                    <option value="" hidden>{{ $user->type }}</option>
                    <option value="admin">ADMIN</option>
                    <option value="user">USER</option>
                </select>

            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>

        </form>


    </div>
@endsection
