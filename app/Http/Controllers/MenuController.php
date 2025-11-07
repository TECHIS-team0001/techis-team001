<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * メニュー一覧を表示
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    /**
     * メニュー作成フォームを表示
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * メニューを登録
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
        ]);

        Menu::create($validated);

        return redirect()->route('menus.index')->with('success', 'メニューを追加しました！');
    }

    /**
     * メニュー編集フォームを表示
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    /**
     * メニューを更新
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
        ]);

        $menu->update($validated);

        return redirect()->route('menus.index')->with('success', 'メニューを更新しました！');
    }

    /**
     * メニューを削除
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'メニューを削除しました！');
    }

    /**
     * 全メニューを削除
     */
    public function reset()
    {
        Menu::truncate();
        return redirect()->route('menus.index')->with('success', '全メニューを削除しました！');
    }

    /**
     * ✅ 会計確認ページ（チェックしたメニューの確認）
     */
    public function confirm(Request $request)
    {
        $selectedIds = explode(',', $request->input('selected_ids', ''));

        // 空配列でアクセスされた場合の処理
        if (empty($selectedIds) || $selectedIds[0] === '') {
            return redirect()->route('menus.index')->with('error', 'メニューが選択されていません。');
        }

        $menus = Menu::whereIn('id', $selectedIds)->get();

        return view('menus.confirm', compact('menus'));
    }
}
