@extends('layouts.app')

@section('title', 'メニュー一覧')

@section('content')
<div style="background: #fffaf5; min-height: 100vh; padding: 40px; font-family: 'Hiragino Maru Gothic ProN', sans-serif;">

    <h1 style="text-align:center; color:#7a5c58; margin-bottom:30px;">🍡 メニュー 🍡</h1>

    <div style="text-align:center; margin-bottom: 20px;">
        <a href="{{ route('menus.create') }}" 
           style="background:#f7c7c0; color:#fff; padding:10px 20px; border-radius:20px; text-decoration:none; font-weight:bold; margin-right:10px;">
           ➕ 新しいメニューを追加
        </a>

        <!-- 会計ボタン -->
        <form id="checkout-form" action="{{ route('checkout') }}" method="POST" style="display:inline;">
            @csrf
            <button id="pay-button" type="submit"
                style="background:#b5d6a7; color:#fff; padding:10px 20px; border:none; border-radius:20px; font-weight:bold; cursor:pointer; display:none;">
                💰 会計へ
            </button>
        </form>
    </div>

    <div style="max-width:900px; margin:auto; border-radius:15px; overflow:hidden; box-shadow:0 0 15px rgba(0,0,0,0.1); background:white;">
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f7c7c0; color:white; text-align:center;">
                    <th style="padding:12px;">✅</th>
                    <th style="padding:12px;">ID</th>
                    <th style="padding:12px;">名前</th>
                    <th style="padding:12px;">種類</th>
                    <th style="padding:12px;">数量</th>
                    <th style="padding:12px;">価格</th>
                    <th style="padding:12px;">操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menus as $menu)
                    <tr style="text-align:center; background: {{ $loop->index % 3 == 0 ? '#f7c7c033' : ($loop->index % 3 == 1 ? '#f4e2b533' : '#b5d6a733') }};">
                        <td style="padding:10px;">
                            <input type="checkbox" class="menu-check" data-id="{{ $menu->id }}">
                        </td>
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
                                    class="delete-btn"
                                    style="background:#e74c3c; border:none; padding:6px 12px; border-radius:10px; color:white; font-weight:bold; cursor:pointer;">
                                    ❌ 削除
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center; padding:20px; color:#7a5c58;">
                            まだメニューが登録されていません。
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- 下にTOPに戻るボタン -->
    <div style="text-align:center; margin-top: 20px;">
        <a href="{{ url('/') }}" 
           style="background:#8ac4d0; color:#fff; padding:10px 20px; border-radius:20px; text-decoration:none; font-weight:bold; display:inline-block;">
           ⬅ TOPに戻る
        </a>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const checks = document.querySelectorAll('.menu-check');
    const payBtn = document.getElementById('pay-button');
    const checkoutForm = document.getElementById('checkout-form');

    checks.forEach(check => {
        check.addEventListener('change', () => {
            const checked = document.querySelectorAll('.menu-check:checked');
            payBtn.style.display = checked.length > 0 ? 'inline-block' : 'none';

            let hiddenInput = checkoutForm.querySelector('input[name="selected_ids"]');
            if (!hiddenInput) {
                hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'selected_ids';
                checkoutForm.appendChild(hiddenInput);
            }
            hiddenInput.value = Array.from(checked).map(chk => chk.dataset.id).join(',');
        });
    });
});
</script>
@endsection
