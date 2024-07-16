<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//アカウント登録画面
Route::get('form', 'App\Http\Controllers\UsersController@regist');
//アカウント登録確認画面
Route::post('/confirm', 'App\Http\Controllers\UsersController@regist_post');
//アカウント登録完了画面
Route::post('/complete','App\Http\Controllers\UsersController@store');
//トップページ'
Route::get('/top', 'App\Http\Controllers\UsersController@top');
//アカウント一覧
Route::get('/list', 'App\Http\Controllers\UsersController@index');
//アカウント削除
Route::get('/delete','App\Http\Controllers\UsersController@account_deletion');
//アカウント削除確認画面
Route::post('/delete_confirm', 'App\Http\Controllers\UsersController@delete_confirm');
//アカウント削除完了画面
Route::post('/delete_complete', 'App\Http\Controllers\UsersController@delete_complete');
//アカウント更新
Route::get('/update','App\Http\Controllers\UsersController@account_update');
