<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Log;
use App\Models\User;
use Auth;
use Validator;

class ImgController extends Controller
{
    // view表示
    public function account(){
        $name = Auth::user()->name;
        return view ('account',
        compact('name'));
    }

    // 画像保存処理
    public function upload(Request $request){
        // ログインユーザー取得
        $user = Auth::user();

        $name = $request->name;
        if( !empty($name) ){
            $user->name = $name;
            $user->save();
        }
        

        // // バリデーション 
        // $validator = $request->validate( [
        //     "img" => 'required|file|image|max:2000', 
        // ]);

        // // 画像ファイル取得
        // $file = $request->img;

        // if ( !empty($file) ) {

        //     // ファイルの拡張子取得
        //     $ext = $file->guessExtension();

        //     //ファイル名を生成
        //     $fileName = str_random().'.'.$ext;

        //     // 画像のファイル名を任意のDBに保存
        //     $user->icon_url = $fileName;
        //     $user->save();

        //     //ファイル名をpublic/uploadフォルダに移動
        //     $move = $file->move('./uploads/images/',$fileName);
        // }
        else{
            return redirect('/hometl');
        }
        return redirect('/hometl');
    }

}
