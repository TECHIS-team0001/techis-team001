<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;

class MenuController extends Controller
{
    // 一覧
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    // 登録ページ
    public function create()
    {
        return view('menus.create');
    }

    // 登録処理
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        Menu::create($request->only('name', 'type', 'quantity', 'price'));

        return redirect()->route('menus.index');
    }

    // 編集ページ
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    // 更新処理
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $menu->update($request->only('name', 'type', 'quantity', 'price'));

        return redirect()->route('menus.index');
    }

    // 個別削除
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index');
    }

    // 全削除
    public function reset()
    {
        Menu::truncate();
        return redirect()->route('menus.index');
    }

    // ✅ 会計ページ
    public function checkout(Request $request)
    {
        $selected = $request->input('selected', []);
        $menus = Menu::whereIn('id', array_keys($selected))->get();

        return view('menus.checkout', compact('menus'));
    }

    // ✅ 注文確定処理
    public function confirm(Request $request)
    {
        $quantities = $request->input('quantities', []);
        $menus = Menu::whereIn('id', array_keys($quantities))->get();

        foreach ($menus as $menu) {
            $qty = $quantities[$menu->id];
            Order::create([
                'menu_name' => $menu->name,
                'menu_type' => $menu->type,
                'quantity' => $qty,
                'price' => $menu->price,
                'subtotal' => $menu->price * $qty,
            ]);
        }

        return view('menus.thanks');
    }
}
