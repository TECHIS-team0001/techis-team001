<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('top');
})->middleware('auth'); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//スタッフ一覧
Route::resource('staff', StaffController::class);

//メニュー画面
Route::resource('menus', MenuController::class);

// 会計処理
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout');

// 注文履歴一覧
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

// 注文履歴全削除
Route::post('/orders/deleteAll', [OrderController::class, 'deleteAll'])->name('orders.deleteAll');

// 全削除
Route::post('/menus/deleteAll', [MenuController::class, 'deleteAll'])->name('menus.deleteAll');

// ログアウト
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');