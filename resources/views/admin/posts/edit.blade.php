@extends('admin.partials.master')
@session('title')
    Sửa bài viết
@endsession
@section('content')
    <div class="p-4">
        <h1>Sửa bài viết</h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="body">Nội dung</label>
                <input class="form-control" id="body" name="content" rows="3"
                    value="{{ $post->content }}"></input>
            </div>
            <div class="form-group">
                <label for="image">Ảnh chính</label>
                <input type="file" name="image" class="form-control">
                <img src="{{ asset($post->image) }}" alt="" width="100px">
            </div>

            <div class="form-group">
                <label for="category_id">Thể loại</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($category as $id => $name)
                        <option @if ($post->category_id == $id) selected @endif value="{{ $id }}">
                            {{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
@endsection
