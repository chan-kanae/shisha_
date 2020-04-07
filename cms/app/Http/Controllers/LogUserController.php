<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Log;
use App\Models\User;
use App\Models\LogUser;

use Auth;
use Validator;

class LogUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     // ブックマーク取得
    public function bookmark(Request $request)
    {
        $myuserid = Auth::user()->id;
        // echo $myuserid,'</br>';
        $user = User::find($myuserid);
        // echo $user,'</br>';
        $posts = $user->logs;
        // echo $posts,'</br>';
        return view ('bookmark',['posts' => $posts] ,['myuserid' => $myuserid]);
    }


    // ブックマーク登録
    public function bookmarkregi(Request $request)
    {
        // ブックマークする投稿
        $post = Log::where('id',$request->post_id)->first();
        // echo $post,' = post</br></br>';
        // ブックマークする投稿のpostid
        $postid = $request->post_id;
        // echo $postid,' = postid</br>';

        // ログインユーザーを取得
        $myuserid = Auth::user()->id;
        // echo $myuserid,' = myuserid</br></br>';
        
        // 今ログインしているユーザーid × この投稿の組み合わせが
        // すでにブックマーク（中間テーブルに保存）されているか確認
        $check = LogUser::where([
            ['user_id', $myuserid],
            ['log_id',$postid]
        ])->get();
        // echo $check," = check</br>";

        // 中間テーブル保存
        $arr = "[]";
        if ($check == $arr){
            $post->users()->attach(
                ['log_id' => $post],
                ['user_id' => $myuserid]
            );
            session()->flash('flashmessage','ブックマークに登録しました');
        }else{
            session()->flash('flashmessage','この投稿は既にブックマークされています');
        }

        $user = User::find($myuserid);
        $posts = $user->logs;

        return redirect('bookmark');
    }

    // ブックマーク削除
    public function bookmarkdel(Request $request)
    {
        // ブックマーク削除する投稿
        $post = Log::where('id',$request->log_id)->first();

        // ブックマークする投稿のpostid
        $postid = $request->log_id;

        // ログインユーザーを取得
        $myuserid = Auth::user()->id;

        // リレーション解除
        $post->users()->detach($myuserid);

        $user = User::find($myuserid);
        $posts = $user->logs;

        return redirect('bookmark')->with('bmdelmessage','ブックマークを削除しました');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogUser  $logUser
     * @return \Illuminate\Http\Response
     */
    public function show(LogUser $logUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LogUser  $logUser
     * @return \Illuminate\Http\Response
     */
    public function edit(LogUser $logUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LogUser  $logUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogUser $logUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MemoUser  $memoUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogUser $logUser)
    {
        //
    }
}
