<?php

use App\Http\Controllers\ProfileController;
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
//アカウント更新確認
Route::post('/update_confirm','App\Http\Controllers\UsersController@update_confirm');
//アカウント更新完了
Route::post('/update_complete','App\Http\Controllers\UsersController@update_complete');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
