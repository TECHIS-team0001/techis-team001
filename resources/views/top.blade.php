@extends('layouts.app')

@section('title', 'トップ')

@section('content')
<style>
.page-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: calc(100vh - 56px); 
    padding: 40px 0;
    background-color: #fffaf5;
}


.container {
    width: 500px;
    background: #fffdf9;
    border: 1px solid #ddd;
    border-radius: 16px;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 30px;
}

h1 {
    font-size: 26px;
    font-weight: bold;
    color: #3e3e3e;
    letter-spacing: 2px;
    margin-bottom: 20px;
}

.photo {
    width: 100%;
    height: 250px;
    overflow: hidden;
    border-radius: 16px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
    background-color: #fffaf5; 
}

.photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.buttons {
    display: flex;
    justify-content: center;
    gap: 40px;
}

.btn {
    width: 120px;
    padding: 10px 0;
    border: none;
    border-radius: 12px;
    font-size: 18px;
    cursor: pointer;
    transition: 0.3s;
    color: #fff;
}

.btn-menu { background-color: #8ac4d0; }
.btn-staff { background-color: #dba39a; }

.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    opacity: 0.9;
}
</style>

<div class="page-wrapper">
    <div class="container">
        <h1>🍡 だんご屋 🍡</h1>

        <div class="photo">
            <img src="{{ asset('images/dango.jpg') }}" alt="店舗写真">
        </div>

        <div class="buttons">
            <a href="{{ url('/menus') }}" class="btn btn-menu">メニュー</a>
            <a href="{{ route('staff.index') }}" class="btn btn-staff">会員管理</a>

        </div>
    </div>
</div>
@endsection
