<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

// Googleログイン
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/test', 'LogsController@test')->name('test');

Route::get('/home', 'HomeController@index')->name('home');

// ホームタイムライン画面
Route::get('/hometl', 'LogsController@tl')->name('hometl');

// メモ入力ページ
Route::get('/index', 'LogsController@index')->name('index');

// 入力したメモをDBに保存
Route::post('/post/input', 'LogsController@input');

// 投稿を編集
Route::post('/postedit{post}','LogsController@edit');

// 投稿の編集を保存
Route::post('/post/update','LogsController@update');

// 投稿を削除
Route::delete('/post/delete/{post}','LogsController@delete');

// マイページ
Route::get('/mypage', 'LogsController@mypage')->name('mypage');

// ブックマーク表示
Route::get('/bookmark', 'LogUserController@bookmark')->name('bookmark');

// ブックマーク登録
Route::post('/bookmark', 'LogUserController@bookmarkregi');

// ブックマーク削除
Route::post('/bookmark/del', 'LogUserController@bookmarkdel');

// アカウント設定ページ
Route::post('/account', 'ImgController@account');

// アイコン登録
Route::post('/account/upload','ImgController@upload');

// あいまい検索view表示
Route::get('/searchindex','LogsController@searchIndex');

// 検索結果
Route::post('search','LogsController@search');

// インクリメンタルサーチ
// Route::post('/post/input', 'FlavorsController@search_ajax');

// 各ユーザーページ
Route::post('person','LogsController@person');