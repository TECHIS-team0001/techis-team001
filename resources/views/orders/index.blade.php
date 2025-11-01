@extends('layouts.app')

@section('content')
<div class="container" style="background-color:#fffafc; border-radius:20px; padding:20px;">
    <h2 style="color:#8ab79b; text-align:center;">🕊 注文履歴</h2>

    <table style="width:100%; text-align:center; border-collapse:collapse;">
        <thead style="background-color:#fbe2e8;">
            <tr>
                <th>ID</th>
                <th>注文内容</th>
                <th>合計金額</th>
                <th>注文日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr style="border-bottom:1px solid #ddd;">
                <td>{{ $order->id }}</td>
                <td>
                    @foreach($order->items as $item)
                        {{ $item['name'] }} (¥{{ number_format($item['price']) }})<br>
                    @endforeach
                </td>
                <td>¥{{ number_format($order->total_price) }}</td>
                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
