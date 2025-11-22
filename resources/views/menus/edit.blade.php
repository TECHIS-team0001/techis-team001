@extends('layouts.app')

@section('title', 'メニュー編集')

@section('content')
<div style="background:#fffaf5; min-height:100vh; padding:40px; font-family:'Hiragino Maru Gothic ProN', sans-serif;">
    <h1 style="text-align:center; color:#7a5c58; margin-bottom:30px;">🍡 編集 🍡</h1>

    <div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:20px; box-shadow:0 0 15px rgba(0,0,0,0.1);">
        <form action="{{ route('menus.update', $menu) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- メニュー名 --}}
            <div style="margin-bottom:20px;">
                <label for="name" style="display:block; color:#7a5c58; font-weight:bold; margin-bottom:5px;">メニュー名</label>
                <input type="text" name="name" id="name" value="{{ old('name', $menu->name) }}"
                       style="width:100%; padding:10px; border:1px solid #f7c7c0; border-radius:10px; font-size:16px;" required>
            </div>

            {{-- 種類（ラジオボタン） --}}
            <div style="margin-bottom:25px;">
                <span style="display:block; color:#7a5c58; font-weight:bold; margin-bottom:8px;">種類</span>
                <div style="display:flex; justify-content:space-around;">
                    <label style="background:#f7c7c0; color:white; padding:8px 16px; border-radius:15px; cursor:pointer; display:flex; align-items:center; gap:6px;">
                        <input type="radio" name="type" value="あんこ" {{ old('type', $menu->type) == 'あんこ' ? 'checked' : '' }} style="accent-color:#f7c7c0;">
                        あんこ
                    </label>
                    <label style="background:#b5d6a7; color:white; padding:8px 16px; border-radius:15px; cursor:pointer; display:flex; align-items:center; gap:6px;">
                        <input type="radio" name="type" value="みたらし" {{ old('type', $menu->type) == 'みたらし' ? 'checked' : '' }} style="accent-color:#b5d6a7;">
                        みたらし
                    </label>
                    <label style="background:#f4e2b5; color:white; padding:8px 16px; border-radius:15px; cursor:pointer; display:flex; align-items:center; gap:6px;">
                        <input type="radio" name="type" value="甘みそ" {{ old('type', $menu->type) == '甘みそ' ? 'checked' : '' }} style="accent-color:#f4e2b5;">
                        甘みそ
                    </label>
                </div>
            </div>

            {{-- 数量 --}}
            <div style="margin-bottom:20px;">
                <label for="quantity" style="display:block; color:#7a5c58; font-weight:bold; margin-bottom:5px;">数量</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $menu->quantity) }}"
                       style="width:100%; padding:10px; border:1px solid #b5d6a7; border-radius:10px; font-size:16px;" min="1" required>
            </div>

            {{-- 価格 --}}
            <div style="margin-bottom:30px;">
                <label for="price" style="display:block; color:#7a5c58; font-weight:bold; margin-bottom:5px;">価格（円）</label>
                <input type="number" name="price" id="price" value="{{ old('price', $menu->price) }}"
                       style="width:100%; padding:10px; border:1px solid #f7c7c0; border-radius:10px; font-size:16px;" min="0" required>
            </div>

            {{-- ボタン --}}
            <div style="text-align:center;">
                <button type="submit"
                        style="background:#b5d6a7; color:white; padding:10px 30px; border:none; border-radius:20px; font-weight:bold; cursor:pointer;">
                    💾 更新
                </button>
                <a href="{{ route('menus.index') }}"
                   style="background:#f7c7c0; color:white; padding:10px 30px; border-radius:20px; text-decoration:none; font-weight:bold; margin-left:10px;">
                    ↩ 戻る
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
