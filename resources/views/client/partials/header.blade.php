<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <nav class="navbar navbar-expand-lg navbar-white p-3">
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
            @if (Auth::user())
                <div class=" btn btn-outline-success dropdown nav-item">
                    <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-secondary"> Đăng nhập / Đăng kí</a>
            @endif

        </div>


    </nav>
</div>
