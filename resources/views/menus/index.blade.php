@extends('layouts.app')

@section('title', 'メニュー一覧')

@section('content')

<div style="background: #fffaf5; min-height: 100vh; padding: 40px; font-family: 'Hiragino Maru Gothic ProN', sans-serif;">
    <h1 style="text-align:center; color:#7a5c58; margin-bottom:30px;">🍡 メニュー一覧 🍡</h1>

    <div style="text-align:center; margin-bottom: 20px;">
        <a href="{{ route('menus.create') }}" 
           style="background:#f7c7c0; color:#fff; padding:10px 20px; border-radius:20px; text-decoration:none; font-weight:bold; margin-right:10px;">
           ➕ 新しいメニューを追加
        </a>
        <form action="{{ route('menus.reset') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" 
                style="background:#b5d6a7; color:#fff; padding:10px 20px; border:none; border-radius:20px; font-weight:bold; cursor:pointer;">
                🗑️ 全削除
            </button>
        </form>
    </div>

    <table style="width:100%; max-width:900px; margin:auto; border-collapse:collapse; background:white; box-shadow:0 0 15px rgba(0,0,0,0.1); border-radius:15px; overflow:hidden;">
        <thead>
            <tr style="background:#f7c7c0; color:white; text-align:center;">
                <th style="padding:12px;">ID</th>
                <th style="padding:12px;">名前</th>
                <th style="padding:12px;">種類</th>
                <th style="padding:12px;">数量</th>
                <th style="padding:12px;">価格</th>
                <th style="padding:12px;">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr style="text-align:center; background: {{ $loop->index % 3 == 0 ? '#f7c7c0' : ($loop->index % 3 == 1 ? '#f4e2b5' : '#b5d6a7') }}33;">
                    <td style="padding:10px;">{{ $menu->id }}</td>
                    <td style="padding:10px;">{{ $menu->name }}</td>
                    <td style="padding:10px;">{{ $menu->type }}</td>
                    <td style="padding:10px;">{{ $menu->quantity }}</td>
                    <td style="padding:10px;">¥{{ number_format($menu->price) }}</td>
                    <td style="padding:10px;">
                        <a href="{{ route('menus.edit', $menu) }}" 
                           style="background:#f4e2b5; padding:6px 12px; border-radius:10px; text-decoration:none; color:#7a5c58; font-weight:bold; margin-right:6px;">
                           ✏️ 編集
                        </a>
                        <form action="{{ route('menus.destroy', $menu) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                style="background:#f7c7c0; border:none; padding:6px 12px; border-radius:10px; color:white; font-weight:bold; cursor:pointer;">
                                ❌ 削除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
