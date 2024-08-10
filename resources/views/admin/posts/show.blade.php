@extends('admin.partials.master')
@session('title')
    Chi tiết bài viết
@endsession
@section('content')
    <div class="p-3">
        <h1>Chi tiết bài viết</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên cột</th>
                    <th>Nội dung chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post->toArray() as $key => $value)
                    <tr>
                        <td>{{ ucfirst($key) }}</td>
                        <td>
                            @if ($key == 'image')
                                <img src="{{ asset($value) }}" alt="" width="100px">
                            @elseif ($key == 'category_id')
                                {{ $post->category->name }}
                            @else
                                {{ $value }}
                            @endif
                        </td>


                    </tr>
                @endforeach
                <h4>Tag:
                    @foreach ($post->tags as $item)
                        - {{ $item->name }}
                    @endforeach
                </h4>

            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">Quay lại</a>
    </div>
@endsection
