<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController; // ← ここにまとめる

Route::get('/', function () {
    return redirect()->route('menus.index');
});

Route::resource('menus', MenuController::class);
Route::post('/menus/reset', [MenuController::class, 'reset'])->name('menus.reset');
Route::post('/menus/confirm', [MenuController::class, 'confirm'])->name('menus.confirm'); // ✅ ← これOK！

// 会計関係
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

Route::get('/test-db', function () {
    return DB::table('users')->get();
});
