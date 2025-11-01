<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // 会計ページの表示
    public function checkout(Request $request)
    {
        $selected = $request->input('selected', []);
        $menus = json_decode($request->input('menus', '[]'), true);

        $selectedMenus = array_filter($menus, fn($m) => in_array($m['id'], $selected));

        $total = array_sum(array_column($selectedMenus, 'price'));

        return view('orders.checkout', compact('selectedMenus', 'total'));
    }

    // 会計確定
    public function store(Request $request)
    {
        $items = $request->input('items');
        $total = $request->input('total_price');

        Order::create([
            'items' => $items,
            'total_price' => $total,
        ]);

        return redirect()->route('orders.index')->with('success', '注文を保存しました！');
    }

    // 注文履歴
    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }
}
