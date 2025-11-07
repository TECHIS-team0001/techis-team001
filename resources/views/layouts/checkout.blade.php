<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>会計ページ</title>
    <style>
        body { background: #fffafc; font-family: 'Arial'; padding: 40px; }
        h1 { text-align: center; color: #ff8fab; font-size: 36px; }
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #ffdce5; padding: 10px; text-align: center; font-size: 18px; }
        th { background-color: #ffdde8; color: #ff5c8d; }
        .total { text-align: right; margin-top: 20px; font-size: 22px; color: #008b74; font-weight: bold; }
        .button { display: block; margin: 30px auto; padding: 10px 20px; background: #ff9bbb; color: white; font-size: 20px; border: none; border-radius: 10px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>🧾 会計ページ 🧾</h1>

    <form action="{{ route('menus.confirm') }}" method="POST">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>メニュー名</th>
                    <th>種類</th>
                    <th>個数</th>
                    <th>単価</th>
                    <th>小計</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($menus as $menu)
                    @php
                        $subtotal = $menu->price * $menu->quantity;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->type }}</td>
                        <td>
                            <input type="number" name="quantities[{{ $menu->id }}]" value="{{ $menu->quantity }}" min="1" style="width:60px;">
                        </td>
                        <td>¥{{ $menu->price }}</td>
                        <td>¥{{ $subtotal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">合計：¥{{ $total }}</div>

        <button type="submit" class="button">注文を確定する</button>
    </form>
</body>
</html>
