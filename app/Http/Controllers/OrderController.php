<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;

class OrderController extends Controller
{
    // 注文履歴一覧
    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    // 会計処理
    public function store(Request $request)
    {
        // フォームから送られた配列を取得
        $menuIds = $request->input('selected_ids', []); // selected_ids[] で配列

        foreach ($menuIds as $menuId) {
            $menu = Menu::find($menuId);

            if ($menu) {
                // 注文履歴に追加
                Order::create([
                    'menu_id' => $menu->id,
                    'name' => $menu->name,
                    'type' => $menu->type,
                    'quantity' => $menu->quantity,
                    'price' => $menu->price,
                ]);

                // 会計したらメニューから削除
                $menu->delete();
            }
        }

        return redirect()
            ->route('orders.index')
            ->with('success', '会計が完了しました！');
    }

    // 注文履歴全削除
    public function deleteAll()
    {
        Order::truncate();
        return redirect()->route('orders.index')->with('success', '全ての注文履歴を削除しました！');
    }
}
