<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

use App\Http\Requests;
use App\Team;

Route::get('/', function () {
    return view('welcome');
});

// 検索一覧（チーム・マッチ共用）
Route::get('/search/{type}', 'SearchController@index');

// ダウンロード（チーム・マッチ共用）
Route::get('/search/download/{id}', 'SearchController@download');
// 削除（チーム・マッチ共用）
Route::post('/search/delete', 'SearchController@delete');

// アップロード画面
Route::get('/simpleUpload', 'UploadController@index');

// アップロード（チーム・マッチデータ）
//post（受け取り）
// TODO コントろらーで作成 Onwer名取得
Route::post('/simpleUpload/teamUpload', 'UploadController@teamUpload');
Route::post('/simpleUpload/matchUpload', 'UploadController@matchUpload');
