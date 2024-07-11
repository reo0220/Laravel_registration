<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Userモデルをuseする
use App\Models\User;

class UsersController extends Controller
{
    public function regist()
    {
        return view('regist');
    }

    public function regist_post(Request $request)
    {   //regist.bladeからPOSTされたデータを取得
        $family_name = $request->input('family_name');
        $last_name = $request->input('last_name');
        $family_name_kana = $request->input('family_name_kana');
        $last_name_kana = $request->input('last_name_kana');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $postal_code = $request->input('postal_code');
        $prefecture = $request->input('prefecture');
        $address_1 = $request->input('address_1');
        $address_2 = $request->input('address_2');
        $authority = $request->input('authority');

        return view('regist_confirm', [
            'family_name' => $family_name,
            'last_name' => $last_name,
            'family_name_kana' => $family_name_kana,
            'last_name_kana' => $last_name_kana,
            'mail' => $mail,
            'password' => $password,
            'gender' => $gender,
            'postal_code' => $postal_code,
            'prefecture' => $prefecture,
            'address_1' => $address_1,
            'address_2' => $address_2,
            'authority' => $authority,
        ]);
    }

    //storeメソッドでフォームで送信された情報をどのテーブル・カラムに登録するか割り当てる
    public function store(Request $request){
        $result = User::create([
            'family_name' => $request->family_name,
            'last_name' => $request->last_name,
            'family_name_kana' => $request->family_name_kana,
            'last_name_kana' => $request->last_name_kana,
            'mail' => $request->mail,
            'password' => $request->password,
            'gender' => $request->gender,
            'postal_code' => $request->postal_code,
            'prefecture' => $request->prefecture,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'authority' => $request->authority,
            'delete_flag' => $request->delete_flag
        ]);

        if(!empty($result)){
            session()->flash('flash_message','登録完了しました');
        }else{
            session()->flash('flash_error_message','エラーが発生したためアカウント登録できません。');
        }

        return view('regist_complete');
    }

    public function top()
    {
        return view('top');
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('list', compact('users'));
    }

}
