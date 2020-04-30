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
        // ログインユーザー
        $user = Auth::user();
        // echo $user,'$user</br>';

        // ログインユーザーid
        $myuserid = Auth::user()->id;
        // echo $myuserid,'</br>';

        // 中間テーブル
        $posts = $user->logs()
        ->with('user:id,name,icon_url')
        ->get();
        // echo $posts,'$posts,</br>';

        return view ('bookmark',
        ['posts' => $posts],
        ['myuserid' => $myuserid]);
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

}
