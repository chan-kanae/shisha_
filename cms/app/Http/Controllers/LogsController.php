<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

use App\Models\Log;
use App\Models\User;
use App\Models\LogUser;
use Auth;
use Validator;
use Socialite; // 追記


class LogsController extends Controller
{
    public function test()
    {
        return view ('test');
    }

    // 投稿全件取得
    public function tl()
    {
        $myuserid = Auth::user()->id;
        // echo $myuserid,' = myuserid</br>';

        $posts = Log::with('user:id,name,icon_url')
        ->orderBy('id','desc')
        ->get();
        // echo( $posts);

        return view('hometl',
        ['posts' => $posts],
        ['myuserid' => $myuserid],
        );

        // return view('hometl',
        // compact('posts','myuserid','check'));
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

        $spot = $request->spot;
        $log = $request->log;
        $feel = $request->feel;
        $user_id = Auth::user()->id;

        $post = new Log;
        $post->spot = $spot;
        $post->log = $log;
        $post->feel = $feel;
        $post->user_id = $user_id;
        $post->save();

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
        // $post->name = $request->name;
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
        // ユーザーid取得
        $myuserid = Auth::user()->id;
        // echo $myuserid,' = $myuserid</br>';

        $myposts = Log::where('user_id', $myuserid)
        ->orderBy('id', 'desc')
        ->get();
        // echo $myposts,' = $myposts</br>';

        $myicon = Auth::user()->icon_url;
        // echo $myicon;

        $myname = Auth::user()->name;
        // echo $myname;

        return view('mypage',
        compact('myname','myicon','myposts'));
    }

    // あいまい検索view表示
    public function searchIndex(){
        return view ('searchIndex');
    }

    // 検索結果
    public function search (Request $request){
        $keyword = $request->input('keyword');
        // echo $keyword;

        if(!empty($keyword)){
            // 全角スペースを半角スペースに変換
            $keywords = str_replace("　", " ", $keyword);

            // 単語をスペースで分割
            $searchValues = preg_split('/\s+/', $keywords, -1, PREG_SPLIT_NO_EMPTY);
            // var_dump ($searchValues);

            $posts = Log::where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $q->where('spot', 'like', "%{$value}%");
                    $q->orWhere('log', 'like', "%{$value}%");
                    $q->orWhere('feel', 'like', "%{$value}%");
                }
            })
            ->orderBy('id','desc')
            ->get();
            // echo $posts;
        }

        $myuserid = Auth::user()->id;
        // echo $myuserid,' = myuserid</br>';

        $arr = "[]";
        if ($posts == $arr){
            // session()->flash('flashmessage','検索結果はありません');
            // $message = '検索結果はありません';
        }

        return view('search',
        // ['keyword' => $keyword],
        ['posts' => $posts],
        ['myuserid' => $myuserid]);
    }

    // 各ユーザーページ
    public function person(Request $request){
        $log_userid = $request->log_userid;
        // echo $log_userid,'$log_userid</br>';

        // logテーブルからuser_idが$log_useridと一致している投稿を取得
        $posts = Log::where('user_id', $log_userid)
        ->with('user:id,name,icon_url')
        ->orderBy('id', 'desc')
        ->get();
        // echo $posts,'$posts</br>';

        $myuserid = Auth::user()->id;

        $back = url()->previous();

        return view ('person',
        ['posts' => $posts],
        ['myuserid' => $myuserid]);
    }

}

