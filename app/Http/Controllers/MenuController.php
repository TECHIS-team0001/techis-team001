<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;

class MenuController extends Controller
{
    // メニュー一覧
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    // 新規メニュー作成画面
    public function create()
    {
        return view('menus.create');
    }

    // 新規メニュー保存
    public function store(Request $request)
    {
        Menu::create($request->all());
        return redirect()->route('menus.index')->with('success', 'メニューを追加しました！');
    }

    // メニュー編集画面
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    // メニュー更新
    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->all());
        return redirect()->route('menus.index')->with('success', 'メニューを更新しました！');
    }

    // メニュー削除
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'メニューを削除しました！');
    }

    // 会計画面（チェックしたメニューを渡す）
    public function checkout(Request $request)
    {
        $selectedIds = $request->input('selected_ids', []);
        $menus = Menu::whereIn('id', $selectedIds)->get();
        return view('checkout', compact('menus'));
    }
}
