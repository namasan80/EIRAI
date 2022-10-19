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
    <script src="{{ mix('js/good.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/eirai.css') }}" rel="stylesheet">
</head>
<body>
    <div class="App">
        <nav class="HeaderNav">
            <div class="HeaderBody">
                <a class="HeaderLink" href="{{ url('/') }}">
                    EIRAI
                </a>
                <ul class="HeaderLeft">
                </ul>
                <ul class="HeaderRight">
                    @auth
                        <a href="{{ url('/users/'.Auth::user()->id) }}" class="BtnGreen">マイページ</a>
                    @else
                        <a href="{{ url('/login') }}" class="BtnGreen">ログイン・新規登録</a>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="Main">
                @yield('content')
        </div>
    </div>
</body>
</html>