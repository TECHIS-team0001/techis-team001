<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CartController extends Controller
{
    /**
     * 会計ページ表示
     */
    public function checkout(Request $request)
    {
        // URLのクエリパラメータから選択されたIDを取得
        $selectedIds = explode(',', $request->query('selected_ids', ''));

        // IDが空ならメニュー一覧に戻す
        if (empty($selectedIds) || $selectedIds[0] === '') {
            return redirect()->route('menus.index')->with('error', 'メニューが選択されていません。');
        }

        // 対象のメニューを取得
        $menus = Menu::whereIn('id', $selectedIds)->get();

        // Bladeに渡す
        return view('checkout', compact('menus'));
    }
}
