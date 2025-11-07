@extends('layouts.app')

@section('title', '会計確認')

@section('content')
<div style="background: #fffaf5; min-height: 100vh; padding: 40px; font-family: 'Hiragino Maru Gothic ProN', sans-serif;">
    <h1 style="text-align:center; color:#7a5c58; margin-bottom:30px;">💰 ご注文内容の確認 💰</h1>

    <div style="max-width:900px; margin:auto; border-radius:15px; overflow:hidden; box-shadow:0 0 15px rgba(0,0,0,0.1); background:white;">
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f7c7c0; color:white; text-align:center;">
                    <th style="padding:12px;">ID</th>
                    <th style="padding:12px;">名前</th>
                    <th style="padding:12px;">種類</th>
                    <th style="padding:12px;">価格</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($menus as $menu)
                    <tr style="text-align:center; background: {{ $loop->index % 3 == 0 ? '#f7c7c033' : ($loop->index % 3 == 1 ? '#f4e2b533' : '#b5d6a733') }};">
                        <td style="padding:10px;">{{ $menu->id }}</td>
                        <td style="padding:10px;">{{ $menu->name }}</td>
                        <td style="padding:10px;">{{ $menu->type }}</td>
                        <td style="padding:10px;">¥{{ number_format($menu->price) }}</td>
                    </tr>
                    @php $total += $menu->price; @endphp
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="max-width:900px; margin:auto; text-align:right; margin-top:20px; font-size:1.2em; font-weight:bold; color:#7a5c58;">
        合計金額：¥{{ number_format($total) }}
    </div>

    <div style="text-align:center; margin-top:30px;">
        <a href="{{ route('menus.index') }}" 
           style="background:#b5d6a7; color:#fff; padding:10px 20px; border-radius:20px; text-decoration:none; font-weight:bold; margin-right:10px;">
           ⬅️ 戻る
        </a>

        <form action="{{ route('menus.confirm') }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="total" value="{{ $total }}">
            <button type="submit"
                style="background:#f7c7c0; color:#fff; padding:10px 20px; border:none; border-radius:20px; font-weight:bold; cursor:pointer;">
                ✅ 注文を確定する
            </button>
        </form>
    </div>
</div>
@endsection
