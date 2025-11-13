@extends('layouts.app')

@section('title', '注文履歴')

@section('content')
<div class="container">
    <h1>📜 注文履歴 📜</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>種類</th>
                <th>数量</th>
                <th>価格</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->type }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>¥{{ number_format($order->price) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">まだ注文はありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
