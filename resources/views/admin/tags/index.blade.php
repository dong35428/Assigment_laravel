@extends('admin.partials.master')
@session('title')
    Tag
@endsession
@section('content')
    <div class="m-2">
        <h1>TAG </h1>
        <a class="btn btn-info" href="{{ route('admin.tags.create') }}">Thêm Tag</a>
        <table class="table table-striped p-3 mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('admin.tags.edit', $tag) }}">Sửa</a>
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')">Xóa</button>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
       {{-- {{ $categories->link()}} --}}
    </div>
@endsection
