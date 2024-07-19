<div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
        <a class="navbar-brand order-1" href="/client/index.html">
            <img class="img-fluid" width="100px" src="/client/images/logo.png" alt="Reader | Hugo Personal Blog Template">
        </a>
        <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('index') }}">
                        Trang chủ
                    </a>
                </li>
                @foreach ($category as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('danhmuc', $item->id) }}">{{ $item->name }}</a>
                    </li>
                @endforeach

            </ul>
        </div>

        <div class="order-2 order-lg-3 d-flex align-items-center">
            <!-- search -->
            <form class="search-bar">
                <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
            </form>

            <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                data-target="#navigation">
                <i class="ti-menu"></i>
            </button>
        </div>

    </nav>
</div>
