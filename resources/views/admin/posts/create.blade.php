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

                <input type="text" class="form-control" id="title" name="user_id" value="{{ Auth::user()->id }}"
                    hidden>
            </div>
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
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- biến thể  --}}

            <label class="form-label">Tag</label>
            <div id="post_tags">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" id="add_variant">Thêm biến thể</button>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        <script>
            var add_variant = document.querySelector('#add_variant');
            var post_tags = document.querySelector('#post_tags');
            var html = ``;
            add_variant.addEventListener('click', function(e) {
                e.preventDefault();
                html = `
                 <div class="mb-3">
                    <select name="post_tags[tag_id][]" class="form-control">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                  </div>

                `;
                post_tags.innerHTML += html;
            });
        </script>
    </div>
@endsection
