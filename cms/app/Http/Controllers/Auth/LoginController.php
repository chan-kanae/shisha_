<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User; // 追記
use Socialite; // 追記
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/hometl';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // 省略
    public function redirectToGoogle()
    {
        // Google へのリダイレクト
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // Google 認証後の処理
        // あとで処理を追加しますが、とりあえず dd() で取得するユーザー情報を確認
        // $gUser = Socialite::driver('google')->stateless()->user(); //エラーにならない
        $gUser = Socialite::driver('google')->user(); //エラーになる
        // $gUser = Socialite::driver('google'); //エラーにらない
        var_dump ($gUser);
        return view ('test');

    }

}
