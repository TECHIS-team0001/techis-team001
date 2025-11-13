<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'だんご屋')</title>
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

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            margin: 5px;
        }

        .btn-menu { background-color: #8ac4d0; }
        .btn-staff { background-color: #dba39a; }
        .btn-add { background-color: #f7c7c0; }
        .btn-confirm { background-color: #b5d6a7; }
        .btn:hover { opacity: 0.9; transform: translateY(-2px); transition: 0.2s; }
    </style>
</head>
<body>
<header>
    <h1>🌸 だんご屋 🌸</h1>
    <nav>
        <a href="{{ url('/') }}">TOP</a> |
        <a href="#">会員登録</a> |
        <a href="{{ route('menus.index') }}">メニュー</a> |
        <a href="{{ route('menus.create') }}">メニュー追加</a> |
        <a href="{{ route('orders.index') }}">注文履歴</a> |
        <a href="#">ログアウト</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>© 2025 Dango Café - Sweet moments for you 🍡</p>
</footer>
</body>
</html>
