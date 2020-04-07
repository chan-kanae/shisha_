<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

use App\Models\Log;
use App\Models\User;
use Auth;
use Validator;

class LogsController extends Controller
{
    // 投稿全件取得
    public function tl()
    {
        $myuserid = Auth::user()->id;
        // echo $myuserid;

        $posts = Log::orderBy('id', 'desc')->get();
        // echo $posts;
        return view('hometl',['posts' => $posts] ,['myuserid' => $myuserid]);
    }

    public function index()
    {
        return view('index');
    }

    // 入力されたメモをDbに保存
    public function input(Request $request)
    {
        //バリデーション
        // $validator = $request->validate([
        //     'name' => 'required | max:10',
        //     'spot' => 'required | max:40',
        //     'log' => 'required | max:80',
        //     'feel' => 'required | max:150',
        // ]);
        // //バリデーション:エラー
        // if ($validator->fails()) {
        //         return redirect('/index')
        //             ->withInput()
        //             ->withErrors($validator);
        // }

        $name = $request->name;
        $spot = $request->spot;
        $log = $request->log;
        $feel = $request->feel;

        $user_id = Auth::user()->id;

        $post = new Log;
        $post->name = $name;
        $post->spot = $spot;
        $post->log = $log;
        $post->feel = $feel;
        $post->userid = $user_id;
        $post->save();

        // $post->users()->attach($user_id);  //これなんのためのコード？
        return redirect('hometl');
    }

    // 投稿を編集
    public function edit( Log $post )
    {
        return view('edit', ['post' => $post] );
    }

    // 投稿の編集を保存
    public function update( Request $request )
    {
        $post = Log::find($request->id);
        $post->name = $request->name;
        $post->spot = $request->spot;
        $post->log = $request->log;
        $post->feel = $request->feel;
        $post->save();
        return redirect('hometl');
    }
    
    // 投稿を削除
    public function delete( Log $post )
    {
        $post->delete();
        return redirect('hometl');
    }
    
    // マイページに遷移
    public function mypage()
    {
        $myuserid = Auth::user()->id;
        // echo $myuserid;
        // echo '</br>';

        // $myposts = Log::where('userid' == $myuserid);
        $myposts = Log::where('userid', $myuserid)->orderBy('id', 'desc')->get();
        // echo $myposts;

        return view('mypage' , ['myposts' => $myposts]);
    }
}
