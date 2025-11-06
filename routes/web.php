<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

// --- トップページ表示 ---
Route::get('/', function () {
    return view('top'); // resources/views/top.blade.php を表示
})->name('top');

// --- メニュー関連 ---
Route::resource('menus', MenuController::class);
Route::post('/menus/reset', [MenuController::class, 'reset'])->name('menus.reset');

// --- 注文関連 ---
Route::post('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');


