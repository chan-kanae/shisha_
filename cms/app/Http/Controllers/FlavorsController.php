<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\User;
use App\Models\Flavor;
use Auth;
use Validator;


class FlavorsController extends Controller
{
    public function search_ajax(Request $request)
    {
        $posts = $request->all();
        // var_dump($posts).' = $posts</br>';
        $data  = Flavor::where('name','like', '%'.$posts['log'].'%')
        ->select('name')
        ->get();
        echo $data,' = $data</br>';
        $result = response()->json(
            [
                'data' => $data 
            ],
            200,[],
            JSON_UNESCAPED_UNICODE
        );
        // dd($result);
        // echo $result,' = $result</br>';
        // var_dump($result).' = $result</br>';

        $json = json_encode($result);
        // dd($json);
        return view('index',
        ['json' => $json]);
    }
}
