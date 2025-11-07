@extends('layouts.app')

@section('title', '会計確認')

@section('content')
<div style="background:#fffaf5; min-height:100vh; padding:40px; font-family:'Hiragino Maru Gothic ProN', sans-serif;">
    <h1 style="text-align:center; color:#7a5c58;">🍵 会計確認ページ 🍵</h1>

    <div style="max-width:700px; margin:auto; background:white; padding:30px; border-radius:20px; box-shadow:0 0 15px rgba(0,0,0,0.1);">
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f7c7c0; color:white;">
                    <th style="padding:10px;">名前</th>
                    <th style="padding:10px;">種類</th>
                    <th style="padding:10px;">数量</th>
                    <th style="padding:10px;">価格</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr style="text-align:center; background:#fff5f0;">
                        <td style="padding:10px;">{{ $menu->name }}</td>
                        <td style="padding:10px;">{{ $menu->type }}</td>
                        <td style="padding:10px;">{{ $menu->quantity }}</td>
                        <td style="padding:10px;">¥{{ number_format($menu->price) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="text-align:center; margin-top:30px;">
            <a href="{{ route('menus.index') }}" 
               style="background:#f7c7c0; color:white; padding:10px 30px; border-radius:20px; text-decoration:none; font-weight:bold;">
               ↩ メニューに戻る
            </a>
        </div>
    </div>
</div>
@endsection
