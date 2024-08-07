<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Userモデルをuseする
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    //トップ画面
    public function top()
    {
        return view('top');
    }

    //アカウント一覧
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('list', compact('users'));
    }

    //アカウント削除
    public function account_deletion()
    {
        //URLのパラメータを取得
        $user_id = $_GET["user_id"];
        //取得したidのアカウントのデータを取得
        $users = User::where('id',$user_id)->get();
        return view('delete',compact('users'));
    }

    //アカウント削除確認
    public function delete_confirm(Request $request)
    {
        $id = $request->input('id');
        return view('delete_confirm',[
            'id' => $id
        ]);
    }

   //アカウント削除完了
    public function delete_complete(Request $request)
    {
        $id = $request->input('id');

        //削除ぼたんをクリックしたidのアカウントの削除フラグを「1」に変更
        $result = User::where('id', '=', $id)->update([
            'delete_flag' => '1',
        ]);

        if(!empty($result)){
            session()->flash('flash_message','削除完了しました');
        }else{
            session()->flash('flash_error_message','エラーが発生したためアカウント削除できません。');
        }

        return view('delete_complete');
    }

    //アカウント更新
    public function account_update()
    {
        $user_id = $_GET["user_id"];
        $users = User::where('id',$user_id)->get();
        return view('update',compact('users'));
    }     
    
    public function update_confirm(Request $request)
    {
        $id = $request->input('id');
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

        return view('update_confirm', [
            'id' => $id,
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

    //アカウント更新完了
    public function update_complete(Request $request)
    {
        $id = $request->input('id');
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

        $result = User::where('id', '=', $id)->update([
            'family_name' => $family_name,
            'last_name' => $last_name,
            'family_name_kana' => $family_name_kana,
            'last_name_kana' => $last_name_kana,
            'mail' => $mail,
            'password' => Hash::make($password),
            'gender' => $gender,
            'postal_code' => $postal_code,
            'prefecture' => $prefecture,
            'address_1' => $address_1,
            'address_2' => $address_2,
            'authority' => $authority,
        ]);

        if(!empty($result)){
            session()->flash('flash_message','更新完了しました');
        }else{
            session()->flash('flash_error_message','エラーが発生したためアカウント更新できません。');
        }

        return view('update_complete');
    }

        
    
}
