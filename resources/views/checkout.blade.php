@extends('layouts.app')

@section('title', '会計確認')

@section('content')
<div style="max-width:900px; margin:auto;">
    <h1 style="text-align:center; color:#7a5c58;">💰 ご注文内容の確認 💰</h1>

    <table style="width:100%; border-collapse:collapse; text-align:center; background:white; border-radius:15px; overflow:hidden; box-shadow:0 0 15px rgba(0,0,0,0.1);">
        <thead style="background:#f7c7c0; color:white;">
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>種類</th>
                <th>価格</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($menus as $menu)
            <tr style="background: {{ $loop->index % 2 == 0 ? '#f7f1f0' : '#fff' }};">
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->type }}</td>
                <td>¥{{ number_format($menu->price) }}</td>
            </tr>
            @php $total += $menu->price; @endphp
            @endforeach
        </tbody>
    </table>

    <div style="text-align:right; margin-top:20px; font-weight:bold; color:#7a5c58;">
        合計金額：¥{{ number_format($total) }}
    </div>

    <div style="text-align:center; margin-top:30px;">
        <a href="{{ route('menus.index') }}" class="btn btn-back">⬅ 戻る</a>

        <form action="{{ route('orders.store') }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="total" value="{{ $total }}">
            @foreach ($menus as $menu)
                <input type="hidden" name="menu_ids[]" value="{{ $menu->id }}">
            @endforeach
            <button type="submit" class="btn btn-checkout">✅ 注文を確定する</button>
        </form>
    </div>
</div>
@endsection
