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
        // echo $myuserid,' = myuserid</br>';

        $posts = Log::with('user:id,name,icon_url')
        ->orderBy('id','desc')
        ->get();
        // echo $posts;

        return view('hometl',
        ['posts' => $posts],
        ['myuserid' => $myuserid]);
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

        // $name = $request->name;
        $spot = $request->spot;
        $log = $request->log;
        $feel = $request->feel;
        $user_id = Auth::user()->id;

        $post = new Log;
        // $post->name = $name;
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
        // ログインユーザー取得
        $user = Auth::user();
        // echo $user,' = $user</br>';

        // ユーザーid取得
        $myuserid = Auth::user()->id;
        // echo $myuserid,' = $myuserid</br>';

        $myposts = Log::where('user_id', $myuserid)
        ->orderBy('id', 'desc')
        ->get();
        // echo $myposts,' = $myposts</br>';

        return view('mypage',
        ['myposts' => $myposts],
        ['user' => $user]);
    }

    // あいまい検索view表示
    public function searchIndex(){
        return view ('searchIndex');
    }

    // 検索結果
    // public function search(Request $request){
    //     $keyword = $request->input('keyword');
    //     // echo $keyword,'$keyword,</br>';

    //     if(!empty($keyword)){
    //         $posts = Log::where('spot', 'like', '%'.$keyword.'%')
    //         ->orWhere('log','like','%'.$keyword.'%')
    //         ->orWhere('feel','like','%'.$keyword.'%')
    //         ->orderBy('id','desc')
    //         ->get();
    //         // echo $posts,'$posts,</br>';
    //     }

    //     $myuserid = Auth::user()->id;
    //     // echo $myuserid,' = myuserid</br>';

    //     return view('search',
    //     // ['keyword' => $keyword],
    //     ['posts' => $posts],
    //     ['myuserid' => $myuserid]);

    // }

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
            })->get();    
        }

        $myuserid = Auth::user()->id;
        // echo $myuserid,' = myuserid</br>';

        return view('search',
        // ['keyword' => $keyword],
        ['posts' => $posts],
        ['myuserid' => $myuserid]);
    }

}
