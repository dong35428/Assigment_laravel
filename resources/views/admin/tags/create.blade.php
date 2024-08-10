@extends('admin.partials.master')
@session('title')
    Thêm Tag
@endsession
@section('content')
    <div class="m-2">
        <h1>Thêm Tag</h1>
        <form action="{{ route('admin.tags.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>

        {{-- {{ $categories->link()}} --}}
    </div>
@endsection
