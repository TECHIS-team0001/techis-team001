@extends('layouts.app')

@section('title', 'メニュー一覧')

@section('content')
<h2 style="text-align:center; color:#7a5c58; margin-bottom:30px;">🍡 メニュー一覧 🍡</h2>

<div style="text-align:center; margin-bottom:20px;">
    <a href="{{ route('menus.create') }}" class="btn" style="background:#b5d6a7;">➕ 新しいメニューを追加</a>

    <form action="{{ route('checkout') }}" method="POST" id="checkoutForm" style="display:inline;">
        @csrf
        <input type="hidden" name="selected_ids" id="selected_ids">
        <button type="submit" class="btn" style="background:#b5d6a7; display:none;" id="payBtn">✅ 会計</button>
    </form>

    <form action="{{ route('menus.deleteAll') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn" style="background:#e74c3c;" onclick="return confirm('本当に全て削除しますか？');">🗑 全削除</button>
    </form>
</div>

<table style="width:100%; border-collapse:collapse; background:white; border-radius:12px; overflow:hidden;">
    <thead>
        <tr style="background:#f7c7c0; color:white; text-align:center;">
            <th>✅</th>
            <th>ID</th>
            <th>名前</th>
            <th>種類</th>
            <th>数量</th>
            <th>価格</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @forelse($menus as $menu)
        <tr style="text-align:center; background: {{ $loop->index % 2 == 0 ? '#fffaf5' : '#f4f4f4' }};">
            <td><input type="checkbox" class="menu-check" data-id="{{ $menu->id }}"></td>
            <td>{{ $menu->id }}</td>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->type }}</td>
            <td>{{ $menu->quantity }}</td>
            <td>¥{{ number_format($menu->price) }}</td>
            <td>
                <a href="{{ route('menus.edit', $menu) }}" class="btn" style="background:#f4e2b5;">編集</a>
                <form action="{{ route('menus.destroy', $menu) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="background:#e74c3c;">削除</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" style="text-align:center; color:#7a5c58;">メニューはまだありません。</td></tr>
        @endforelse
    </tbody>
</table>

<div style="text-align:center; margin-top:20px;">
    <a href="{{ url('/') }}" class="btn" style="background:#8ac4d0;">⬅ TOPに戻る</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const checks = document.querySelectorAll('.menu-check');
    const payBtn = document.getElementById('payBtn');
    const selectedIdsInput = document.getElementById('selected_ids');

    checks.forEach(check => {
        check.addEventListener('change', () => {
            const checked = Array.from(document.querySelectorAll('.menu-check:checked'));
            payBtn.style.display = checked.length > 0 ? 'inline-block' : 'none';
            selectedIdsInput.value = checked.map(c => c.dataset.id).join(',');
        });
    });

    // 30秒ごとに自動更新
    setInterval(() => location.reload(), 30000);
});
</script>
@endsection
