@extends('layouts.app')

@section('title', 'だんご屋 トップ')

@section('content')
<div class="container">
    <h1>🍡 だんご屋 🍡</h1>

    <div class="photo">
        <img src="{{ asset('images/dango.jpg') }}" alt="店舗写真">
    </div>

    <div class="buttons">
        <a href="{{ url('/menus') }}" class="btn btn-menu">メニュー</a>
        <a href="#" class="btn btn-staff">スタッフ</a>
    </div>
</div>
@endsection
