<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="mx-auto">
        <!--header-->
            <header class="header d-flex">
                <h1 class="header-logo">
                    <img src="{{ secure_asset('img/My Travel.png') }}" alt="logo" class="logo-img">
                 </h1>
                <!--ナビゲーションバー-->
                <nav class="header-nav">
                    <ul class="nav-list d-flex">
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                         {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">MyPage</a></li>
                        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Fav</a></li>
                        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Post</a></li>
                        @endguest
                        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Explore</a></li>
                    </ul>
                </nav>
            </header>
        
            <main class="py-4">
                 @yield('content')
            </main>
        </div>
    </body>
</html>