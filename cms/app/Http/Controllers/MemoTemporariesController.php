<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MemoTemporary;
use App\Models\User;
use Auth;
use Validator;


class MemoTemporariesController extends Controller
{

    // 投稿全件取得
    public function tl()
    {
        $posts = MemoTemporary::orderBy('id', 'desc')->get();
        // echo $posts;
        return view('hometl',['posts' => $posts] );
    }

    public function index()
    {
        return view('index');
    }

    // 入力されたメモをDbに保存
    public function input(Request $request)
    {
        $name = $request->name;
        $spot = $request->spot;
        $log = $request->log;
        $feel = $request->feel;

        $user_id = Auth::user()->id;

        $post = new MemoTemporary;
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
    public function edit( MemoTemporary $post )
    {
        return view('edit', ['post' => $post] );
    }

    // 投稿の編集を保存
    public function update( Request $request )
    {
        $post = MemoTemporary::find($request->id);
        $post->name = $request->name;
        $post->spot = $request->spot;
        $post->log = $request->log;
        $post->feel = $request->feel;
        $post->save();
        return redirect('hometl');
    }
    
    // 投稿を削除
    public function delete( MemoTemporary $post )
    {
        $post->delete();
        return redirect('hometl');
    }
}
