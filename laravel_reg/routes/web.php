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