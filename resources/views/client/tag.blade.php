@extends('client.partials.master')
@section('title')
    {{ $tagID->name }}
@endsection
@section('content')
    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8  mb-5 mb-lg-0">
                    <h2 class="h5 section-title">{{ $tagID->name }}</h2>
                    @foreach ($tags->posts as $post)
                        <article class="card mb-4">
                            <div class="post-slider">
                                <img src="{{ asset($post->image) }}" class="card-img-top" alt="post-thumb">
                                {{-- <img src="/client/images/post/post-1.jpg" class="card-img-top" alt="post-thumb"> --}}
                            </div>
                            <div class="card-body">
                                <h3 class="mb-3"><a class="post-title"
                                        href="{{ route('show', $post->id) }}">{{ $post->title }}</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="/client/author-single.html" class="card-meta-author">
                                            <img src="/client/images/john-doe.jpg" alt="John Doe">
                                            <span>{{ $post->user->name }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i>{{ $post->created_at }}
                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            @foreach ($post->tags as $item)
                                                <li class="list-inline-item"><a href="">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                                <a href="{{ route('show', $post->id) }}" class="btn btn-outline-primary">Chi tiết</a>
                            </div>
                        </article>
                    @endforeach



                    <ul class="pagination justify-content-center">
                        <li class="page-item page-item active ">
                            <a href="#!" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#!" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#!" class="page-link">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
