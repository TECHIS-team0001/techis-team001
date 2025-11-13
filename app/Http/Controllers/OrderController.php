<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;

class OrderController extends Controller
{
    // 注文確定（checkoutページで確定ボタン押したとき）
    public function store(Request $request)
    {
        $menuIds = $request->input('menus', []);

        if (empty($menuIds)) {
            return redirect()->route('menus.index')->with('error', 'メニューを選択してください。');
        }

        foreach ($menuIds as $id) {
            $menu = Menu::find($id);
            if ($menu) {
                // 注文履歴に保存
                Order::create([
                    'name' => $menu->name,
                    'type' => $menu->type,
                    'quantity' => $menu->quantity,
                    'price' => $menu->price,
                ]);

                // メニューから削除
                $menu->delete();
            }
        }

        return redirect()->route('orders.index')->with('success', '注文が完了しました！');
    }

    // 注文履歴ページ
    public function index()
    {
        $orders = Order::all(); // 注文履歴を全件取得
        return view('orders.index', compact('orders'));
    }
}
