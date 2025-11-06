<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>注文完了</title>
    <style>
        body { background-color: #fffafc; text-align: center; padding: 100px; font-family: 'Arial'; }
        h1 { color: #00b894; font-size: 40px; margin-bottom: 30px; }
        p { font-size: 20px; color: #555; }
        a { display: inline-block; margin-top: 30px; padding: 12px 24px; background: #ff8fab; color: white; border-radius: 12px; text-decoration: none; font-size: 20px; }
        a:hover { background: #ff6f91; }
    </style>
</head>
<body>
    <h1>🎀 ご注文ありがとうございました 🎀</h1>
    <p>またのご利用をお待ちしております🍡</p>
    <a href="{{ route('menus.index') }}">メニューに戻る</a>
</body>
</html>
