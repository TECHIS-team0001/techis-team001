<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

// --- TOPページ ---
Route::get('/', function () {
    return view('top');
})->name('top');

// --- メニュー関連 ---
Route::resource('menus', MenuController::class);

// --- 会計ページ ---
Route::post('/checkout', [MenuController::class, 'checkout'])->name('checkout');

// --- 注文関連 ---
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
// メニュー全削除
Route::post('/menus/delete-all', [MenuController::class, 'deleteAll'])->name('menus.deleteAll');

// 注文履歴全削除
Route::post('/orders/delete-all', [OrderController::class, 'deleteAll'])->name('orders.deleteAll');
