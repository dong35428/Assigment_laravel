@extends('client.partials.master');
@section('title')
    Trang chủ
@endsection
@section('content')
    <!-- start of banner -->
    <div class="banner text-center">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <h1 class="mb-5">BẠN THÍCH ĐỌC GÌ<br>VÀO HÔM NAY?</h1>
                    <ul class="list-inline widget-list-inline">
                        <li class="list-inline-item"><a href="/client/tags.html">City</a></li>
                        @foreach ($tags as $tag)
                            {{-- <li class="list-inline-item"><a href="#">{{ $tag->name }}</a></li> --}}
                            <li class="list-inline-item"><a href="{{route('tag',$tag->id)}}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <svg class="banner-shape-1" width="39" height="40" viewBox="0 0 39 40" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
                stroke-miterlimit="10" />
            <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
            <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
                stroke-miterlimit="10" />
        </svg>

        <svg class="banner-shape-2" width="39" height="39" viewBox="0 0 39 39" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d)">
                <path class="path"
                    d="M24.1587 21.5623C30.02 21.3764 34.6209 16.4742 34.435 10.6128C34.2491 4.75147 29.3468 0.1506 23.4855 0.336498C17.6241 0.522396 13.0233 5.42466 13.2092 11.286C13.3951 17.1474 18.2973 21.7482 24.1587 21.5623Z" />
                <path
                    d="M5.64626 20.0297C11.1568 19.9267 15.7407 24.2062 16.0362 29.6855L24.631 29.4616L24.1476 10.8081L5.41797 11.296L5.64626 20.0297Z"
                    stroke="#040306" stroke-miterlimit="10" />
            </g>
            <defs>
                <filter id="filter0_d" x="0.905273" y="0" width="37.8663" height="38.1979" filterUnits="userSpaceOnUse"
                    color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                    <feOffset dy="4" />
                    <feGaussianBlur stdDeviation="2" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
                </filter>
            </defs>
        </svg>


        <svg class="banner-shape-3" width="39" height="40" viewBox="0 0 39 40" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
                stroke-miterlimit="10" />
            <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
            <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
                stroke-miterlimit="10" />
        </svg>


        <svg class="banner-border" height="240" viewBox="0 0 2202 240" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1 123.043C67.2858 167.865 259.022 257.325 549.762 188.784C764.181 125.427 967.75 112.601 1200.42 169.707C1347.76 205.869 1901.91 374.562 2201 1"
                stroke-width="2" />
        </svg>
    </div>
    <!-- end of banner -->
    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Nhiều Lượt Xem</h2>
                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="{{ asset($view->image) }}" class="card-img-top" alt="post-thumb">
                        </div>

                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title"
                                    href="{{ route('show', $view->id) }}">{{ $view->title }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="/client/author-single.html" class="card-meta-author">
                                        <img src="/client/images/john-doe.jpg">
                                        <span>{{ $view->user->name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>{{ $view->created_at }}
                                </li>

                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach ($view->tags as $tag)
                                            <li class="list-inline-item"><a href="/client/tags.html">{{ $tag->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>

                            <a href="{{ route('show', $view->id) }}" class="btn btn-outline-primary">Chi tiết</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Bài Viết Hot</h2>


                    @foreach ($hotPosts as $post)
                        <article class="card mb-4">
                            <div class="card-body d-flex">
                                <img class="card-img-sm" src="{{ asset($post->image) }}">
                                <div class="ml-3">
                                    <h4><a href="/client/post-details.html" class="post-title">{{ $post->title }}</a>
                                    </h4>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>{{ $post->created_at }}
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div>

                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Bài Viết Phổ Biến</h2>

                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="{{ asset($popular->image) }}" class="card-img-top" alt="post-thumb">
                        </div>
                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title"
                                    href="{{ route('show', $popular->id) }}">{{ $popular->title }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="/client/author-single.html" class="card-meta-author">
                                        <img src="/client/images/kate-stone.jpg" alt="Kate Stone">
                                        <span>{{ $popular->user->name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>{{ $popular->created_at }}
                                </li>

                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach ($popular->tags as $tag)
                                            <li class="list-inline-item"><a
                                                    href="/client/tags.html">{{ $tag->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>

                            <a href="{{ route('show', $popular->id) }}" class="btn btn-outline-primary">Chi tiết</a>
                        </div>
                    </article>
                </div>
                <div class="col-12">
                    <div class="border-bottom border-default"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8  mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Bài Viết</h2>
                    @foreach ($posts as $post)
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


                        {{ $posts->links() }}

                </div>
                <aside class="col-lg-4 sidebar-home">
                    <!-- Search -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Tìm kiếm</span></h4>
                        <form action="#!" class="widget-search">
                            <input class="mb-3" id="search-query" name="s" type="search"
                                placeholder="Tìm kiếm">
                            <i class="ti-search"></i>
                            <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                        </form>
                    </div>

                    <!-- about me -->


                    <!-- Promotion -->


                    <!-- authors -->
                    <div class="widget widget-author">
                        <h4 class="widget-title">Tác giả</h4>
                        @foreach ($users as $user)
                            <div class="media align-items-center">
                                <div class="mr-3">
                                    <img class="widget-author-image" src="/client/images/john-doe.jpg">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1"><a class="post-title"
                                            href="/client/author-single.html">{{ $user->name }}</a></h5>
                                </div>
                            </div>
                        @endforeach



                    </div>
                    <!-- Search -->
                    <!-- categories -->
                    <div class="widget widget-categories">
                        <h4 class="widget-title"><span>Danh mục</span></h4>
                        <ul class="list-unstyled widget-list">

                            @foreach ($category as $item)
                                <li><a href="{{ route('danhmuc', $item->id) }}" class="d-flex">{{ $item->name }}
                                        <small class="ml-auto">(4)</small></a></li>
                            @endforeach

                        </ul>
                    </div><!-- tags -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Tags</span></h4>
                        <ul class="list-inline widget-list-inline widget-card">

                            @foreach ($tags as $tag)
                                <li class="list-inline-item"><a href="{{route('tag',$tag->id)}}">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- recent post -->
                    <div class="widget">
                        <h4 class="widget-title">Bài đăng gần đây</h4>

                        <!-- post-item -->

                        @foreach ($postLimit as $item)
                            <article class="widget-card">
                                <div class="d-flex">
                                    <img class="card-img-sm" src="{{ asset($item->image) }}">
                                    <div class="ml-3">
                                        <h5><a class="post-title" href="/client/post/elements/">{{ $item->title }}</a>
                                        </h5>
                                        <ul class="card-meta list-inline mb-0">
                                            <li class="list-inline-item mb-0">
                                                <i class="ti-calendar"></i>{{ $item->created_at }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @endforeach


                    </div>

                    <!-- Social -->

                </aside>
            </div>
        </div>
    </section>
@endsection
