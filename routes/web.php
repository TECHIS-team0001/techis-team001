<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

// TOPページ
Route::get('/', function () {
    return view('top');
});

// メニュー操作
Route::resource('menus', MenuController::class);

// 会計ページ（チェックしたメニューの確認）
Route::post('/checkout', [MenuController::class, 'checkout'])->name('checkout');

// 注文確定（会計確認後）
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');

// 注文履歴ページ
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
