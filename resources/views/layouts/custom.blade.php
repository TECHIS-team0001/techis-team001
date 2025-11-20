<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'だんご屋')</title>
</head>
<body>
<header>
    <h1>🌸 だんご屋 🌸</h1>
    <nav>
        <a href="{{ url('/') }}">TOP</a> |
        <a href="#">会員登録</a> |
        <a href="{{ route('menus.index') }}">メニュー</a> |
        <a href="{{ route('orders.index') }}">注文履歴</a> |
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
            @csrf
        </form>
    </nav>
</header>

<main>
    @yield('content') <!-- ページごとの内容がここに入る -->
</main>
</body>
</html>
