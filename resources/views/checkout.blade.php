@extends('layouts.app')

@section('title', '会計確認')

@section('content')
<h2 style="text-align:center; margin-bottom:20px; color:#7a5c58;">💰 会計確認 💰</h2>

@if($menus->isEmpty())
    <p style="text-align:center; color:#7a5c58;">選択されたメニューはありません。</p>
@else
<form action="{{ route('checkout') }}" method="POST"> <!-- POST checkout ルート -->
    @csrf

    <table style="width:100%; border-collapse:collapse; background:white; border-radius:12px; overflow:hidden; margin-bottom:20px;">
        <thead>
            <tr style="background:#f7c7c0; color:white; text-align:center;">
                <th>ID</th>
                <th>名前</th>
                <th>種類</th>
                <th>数量</th>
                <th>価格</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($menus as $menu)
            <tr style="text-align:center; background: {{ $loop->index % 2 == 0 ? '#fffaf5' : '#f4f4f4' }};">
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->type }}</td>
                <td>{{ $menu->quantity }}</td>
                <td>¥{{ number_format($menu->price) }}</td>
            </tr>
            <input type="hidden" name="selected_ids[]" value="{{ $menu->id }}">
            @php $total += $menu->price; @endphp
            @endforeach
        </tbody>
    </table>

    <div style="text-align:right; font-weight:bold; margin-bottom:20px; color:#7a5c58;">
        合計金額：¥{{ number_format($total) }}
    </div>

    <div style="text-align:center;">
        <button class="btn" style="background:#b5d6a7; padding:10px 20px; border-radius:12px; color:white; font-weight:bold; cursor:pointer;">
            💰 確定
        </button>
    </div>
</form>
@endif

<div style="text-align:center; margin-top:20px;">
    <a href="{{ route('menus.index') }}" class="btn" style="background:#f7c7c0; padding:10px 20px; border-radius:12px; color:white; font-weight:bold; text-decoration:none;">
        ⬅ メニューに戻る
    </a>
</div>
@endsection
