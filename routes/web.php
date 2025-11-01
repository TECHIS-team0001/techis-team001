<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController; // ← これも追加されてるね

Route::get('/', function () {
    return redirect()->route('menus.index');
});

Route::resource('menus', MenuController::class);


Route::post('/menus/reset', [MenuController::class, 'reset'])->name('menus.reset');

Route::post('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
