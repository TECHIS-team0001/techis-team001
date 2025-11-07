<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;  // ← main から取り込み

// --- トップページ表示 ---
Route::get('/', function () {
    return view('top');
})->name('top');

// --- メニュー関連 ---
Route::resource('menus', MenuController::class);
Route::post('/menus/reset', [MenuController::class, 'reset'])->name('menus.reset');
Route::post('/menus/confirm', [MenuController::class, 'confirm'])->name('menus.confirm');

// --- 会計 (CartController) ---
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

// --- 注文関連 (OrderController) ---
Route::post('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

// ---- 任意：DBテスト ----
// Route::get('/test-db', function () {
//     return DB::table('users')->get();
// });

