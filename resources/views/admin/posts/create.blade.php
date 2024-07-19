@extends('admin.partials.master')
@session('title')
    Thêm bài viết
@endsession
@section('content')
    <div class="p-4">
        <h1>Thêm bài viết</h1>
        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="body">Nội dung</label>
                <textarea class="form-control" id="body" name="content" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Ảnh chính</label>
                {{-- <input type="text" class="form-control" name='image' > --}}
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="category_id">Thể loại</label>
                <select class="form-control"  id="category_id" name="category_id">
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
@endsection
