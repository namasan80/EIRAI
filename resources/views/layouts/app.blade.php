<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EIRAI</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ mix('js/good.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/eirai.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="HeaderNav">
            <div class="HeaderBody">
                <a class="HeaderLink" href="{{ url('/') }}">
                    EIRAI
                </a>
                <ul class="HeaderLeft">
                </ul>
                <ul class="HeaderRight">
                    @auth
                        <a href="{{ url('/users/'.Auth::user()->id) }}" class="BtnBlue">マイページ</a>
                    @else
                        <a href="{{ url('/login') }}" class="BtnBlue">ログイン・新規登録</a>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            <div class="Main">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>