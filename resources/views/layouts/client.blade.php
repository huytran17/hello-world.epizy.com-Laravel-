<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-control" content="public, max-age=31536000, immutable">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="{{ $site->title }}">
    <meta property="og:description" content="{{ $site->description }}">
    <meta property="og:image" content="{{ $site->logo_photo_path }}">
    <meta property="og:url" content="{{ config('app.url', 'https://hello-world.com.test') }}">
    <meta name="twitter:title" content="{{ $site->title }}">
    <meta name="twitter:description" content="{{ $site->description }}">
    <meta name="twitter:image" content="{{ $site->logo_photo_path }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="description" content="{{ $site->description }}">
    <meta name="keywords" content="{{ $site->keywords }}">
    <meta name="author" content="{{ $site->author }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" charset="utf-8">
    <link href="{{ asset('css/nprogress.css') }}" rel="stylesheet" charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client/app.css') }}">
    <!--bs4, jq-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        @if(!\Route::is('login') && !\Route::is('register'))
        <aside id="colorlib-aside" role="complementary" class="js-fullheight img" style="background-image: url({{ asset('images/sidebar-bg.jpg') }});">
            <h1 id="colorlib-logo" class="mb-4"><a href="{{ route('home') }}">{{ config('app.name', 'hello-world') }}</a></h1>

            <nav id="colorlib-main-menu" role="navigation">
                @auth
                <a href="{{ route('client.user.profile', ['id' => auth()->id()]) }}">
                    <img src="{{ auth()->user()->profile_photo_path }}" alt="{{ auth()->user()->slug }}" width="40" height="40" class="rounded-circle">
                </a>
                @endauth
                <ul class="mt-2">
                    <li class="{{ \Route::is('home') ? 'colorlib-active' : '' }}">
                        <a href="{{ route('home') }}">Trang chủ</a>
                    </li>
                    <li class="{{ (\Route::is('client.cate.index') || \Route::is('client.cate.showPost') || \Route::is('client.cate.showChildren')) ? 'colorlib-active' : '' }}">
                        <a href="{{ route('client.cate.index') }}">Khám phá</a>
                    </li>
                    <li class="{{ (\Route::is('client.post.newestPosts') || \Route::is('client.post.show') || \Route::is('post.search') || \Route::is('post.search.tag')) ? 'colorlib-active' : '' }}">
                        <a href="{{ route('client.post.newestPosts') }}">Bài viết</a>
                    </li>
                    <li class="{{ \Route::is('client.about') ? 'colorlib-active' : '' }}">
                        <a href="{{ route('client.about') }}">Giới thiệu</a>
                    </li>
                    <li class="{{ \Route::is('client.contact') ? 'colorlib-active' : '' }}">
                        <a href="{{ route('client.contact') }}">Feedback</a>
                    </li>
                </ul>
            </nav>
            <div class="colorlib-footer">
                {{-- @if(!\Route::is('client.post.show') && !\Route::is('forgot-password'))
                <div class="mb-4">
                    <h3>Đăng ký nhận bài viết mới</h3>
                    <form action="{{ route('client.user.subscribe') }}" method="post" class="colorlib-subscribe-form">
                        @csrf
                        <div class="form-group d-flex">
                            cmt::<div class="icon"><span class="icon-paper-plane"></span></div>
                            <button type="submit" class="icon" style="background-color: transparent; border: none;"><span class="icon-paper-plane"></button>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập Email của bạn" required="required">
                        </div>
                        <div class="form-group">
                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </form>
                </div>
                @endif --}}
                @auth
                <p class="pfooter">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        {{ __('Đăng xuất') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </p>
                @else
                @if (Route::has('login'))
                <li>
                    <a href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                </li>
                @endif
                @endauth
            </div>
        </aside> <!-- END COLORLIB-ASIDE -->
        @endif
        <main class="container-fluid p-0 m-0" id="MainPanel">
            @yield('content')
        </main>
        <div id="AppendPosition"></div>
    </div>
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg>
    </div>
    <script src="{{ asset('js/client/comment.js') }}" charset="utf-8" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- axios-->
    <script src="https://cdn.jsdelivr.net/npm/axios@0.20.0/dist/axios.min.js"></script>
    <script src="{{ asset('js/nprogress.js') }}" charset="utf-8" defer></script>
    <script src="{{ asset('js/client/app.js') }}" charset="utf-8" defer></script>
    <script src="{{ asset('js/client/user.js') }}" charset="utf-8" defer></script>
    <script src="{{ asset('js/client/post.js') }}" charset="utf-8" defer></script>
    <script src="{{ asset('js/inputEmoji.js') }}" charset="utf-8" defer></script>
</body>

</html>
