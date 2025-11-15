<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    // メニュー一覧
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    // メニュー追加フォーム
    public function create()
    {
        return view('menus.create');
    }

    // データ保存
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->type = $request->type;
        $menu->quantity = $request->quantity;
        $menu->price = $request->price;
        $menu->save();

        return redirect()->route('menus.index');
    }

    // メニュー編集
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->name = $request->name;
        $menu->type = $request->type;
        $menu->quantity = $request->quantity;
        $menu->price = $request->price;
        $menu->save();

        return redirect()->route('menus.index');
    }

    // メニュー削除
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index');
    }
    // メニュー全削除
public function deleteAll()
{
    Menu::truncate();
    return redirect()->route('menus.index')->with('success', '全てのメニューを削除しました！');
}

    // 会計処理
    public function checkout(Request $request)
    {
        // 選択されたメニューIDを取得
        $ids = explode(',', $request->selected_ids ?? '');
        $menus = Menu::whereIn('id', $ids)->get();

        // 合計金額を計算
        $total = $menus->sum('price');

        return view('checkout', compact('menus', 'total'));
    }
}
