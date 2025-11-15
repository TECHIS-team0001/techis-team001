@extends('layouts.app')

@section('title', '注文履歴')

@section('content')
<h2 style="text-align:center; color:#7a5c58; margin-bottom:20px;">🕊 注文履歴 🕊</h2>

<div style="text-align:center; margin-bottom:20px;">
    <form action="{{ route('orders.deleteAll') }}" method="POST">
        @csrf
        <button type="submit" class="btn" style="background:#e74c3c;" onclick="return confirm('本当に全て削除しますか？');">🗑 全削除</button>
    </form>
</div>

<table style="width:100%; border-collapse:collapse; background:white; border-radius:12px; overflow:hidden;">
    <thead>
        <tr style="background:#f7c7c0; color:white; text-align:center;">
            <th>ID</th>
            <th>名前</th>
            <th>種類</th>
            <th>数量</th>
            <th>価格</th>
            <th>注文日時</th>
        </tr>
    </thead>
    <tbody>
        @forelse($orders as $order)
        <tr style="text-align:center;">
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->type }}</td>
            <td>{{ $order->quantity }}</td>
            <td>¥{{ number_format($order->price) }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center; color:#7a5c58;">注文履歴はまだありません。</td></tr>
        @endforelse
    </tbody>
</table>

<div style="text-align:center; margin-top:20px;">
    <a href="{{ url('/') }}" class="btn" style="background:#8ac4d0;">⬅ TOPに戻る</a>
</div>
@endsection
