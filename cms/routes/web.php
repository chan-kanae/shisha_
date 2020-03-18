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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ホームタイムライン画面
Route::get('/hometl', 'MemoTemporariesController@tl')->name('hometl');

// メモ入力ページ
Route::get('/index', 'MemoTemporariesController@index')->name('index');

// 入力したメモをDBに保存
Route::post('/post/input', 'MemoTemporariesController@input');

// 投稿を編集
Route::post('/post/edit/{post}','MemoTemporariesController@edit');

// 投稿の編集を保存
Route::post('/post/update','MemoTemporariesController@update');

// 投稿を削除
Route::delete('/post/delete/{post}','MemoTemporariesController@delete');