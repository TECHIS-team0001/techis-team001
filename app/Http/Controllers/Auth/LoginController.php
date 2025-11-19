<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * ログイン後のリダイレクト先
     *
     * @var string
     */
    protected $redirectTo = '/'; // ログイン成功後に top.blade に遷移


    /**
     * ログアウト後にログイン画面にリダイレクト
     */
    protected function loggedOut(Request $request)
    {
        return redirect()->route('login'); // ログイン画面へ
    }

    /**
     * コントローラーのコンストラクタ
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

