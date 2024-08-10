@extends('admin.partials.master')
@session('title')
    Sửa Tag
@endsession
@section('content')
    <div class="m-2">
        <h1>Sửa Tag</h1>
        <form action="{{ route('admin.tags.update',$tag->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên Tag</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ $tag->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>

        </form>

        {{-- {{ $categories->link()}} --}}
    </div>
@endsection
