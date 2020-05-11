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
        $gUser = Socialite::driver('google')->user();
        var_dump ($gUser);

        $id = $gUser->getid();
        // echo $id;

        // email が合致するユーザーを取得
        $user = User::where('email', $gUser->email)->first();
        // 見つからなければ新しくユーザーを作成
        if ($user == null) {
            $user = $this->createUserByGoogle($gUser);
        }
        // ログイン処理
        \Auth::login($user, true);

        return redirect ('hometl');
    }

    public function createUserByGoogle($gUser)
    {
        // $user = User::create([
        //     'name'     => $gUser->name,
        //     'email'    => $gUser->email,
        //     'userid'   => $gUser->id,
        //     'icon_url'  => $gUser->avatar,
        //     'password' => \Hash::make(uniqid()),
        // ]);

        $user = new User();
        $user->name = $gUser->name;
        $user->email = $gUser->email;
        $user->userid = $gUser->id;
        $user->icon_url = $gUser->avatar;
        $user->save();

        $id = $gUser->id;
        // echo ($id);
        $icon = $gUser->avatar;
        // echo ($icon);
        return $user;
    }

}
