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

    $menuIds = explode(',', $request->input('selected_ids', ''));

    foreach ($menuIds as $menuId) { 
        $menu = Menu::find($menuId);
        
        if ($menu) { 
            Order::create([ 
                'menu_id' => $menu->id, 
                'name' => $menu->name, 
                'type' => $menu->type, 
                'quantity' => $menu->quantity, 
                'price' => $menu->price, ]);
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
