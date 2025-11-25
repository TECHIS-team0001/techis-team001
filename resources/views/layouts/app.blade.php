<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'だんご屋')</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: "Hiragino Maru Gothic Pro", Arial, sans-serif;
            background: linear-gradient(to bottom right, #fff, #ffe6eb, #e0f2e9);
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            background: #fffafc;
            padding: 20px;
            border-bottom: 3px solid #ffb6c1;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            color: #ff88a9;
            font-size: 32px;
            font-weight: bold;
        }

        nav a {
            text-decoration: none;
            margin: 0 15px;
            color: #5a5a5a;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ff88a9;
        }

        main {
            max-width: 900px;
            margin: 40px auto;
            background: #ffffffcc;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            text-align: center;
            color: #777;
            margin: 30px 0 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

@php
    // ▼ ナビバー非表示にしたいページ
    $hideNavbar = request()->is('login')      // ログインページ
        || request()->is('register')         // 登録ページ
        || request()->is('password/*')       // パスワードリセット系
        || request()->is('staff/create');    // スタッフ登録ページ
@endphp

{{-- ナビバー表示 --}}
@if (!$hideNavbar)
<header>
    <h1>🌸 だんご屋 🌸</h1>
    <nav>
        <ul style="list-style: none; display: flex; justify-content: center; gap: 15px; padding: 0; margin: 0;">
            

            @auth
            　　<li><a href="{{ route('top') }}">TOP</a></li>
                <li><a href="{{ route('staff.index') }}">会員管理</a></li>
                <li><a href="{{ route('menus.index') }}">注文管理</a></li>
                <li><a href="{{ route('menus.create') }}">注文</a></li>
                <li><a href="{{ route('orders.index') }}">注文履歴</a></li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                </li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}">ログイン</a></li>
            @endguest
        </ul>
    </nav>
</header>
@endif

<main>
    @yield('content')
</main>

<footer>
    <p>© 2025 Dango Café - Sweet moments for you 🍡</p>
</footer>

</body>
</html>
