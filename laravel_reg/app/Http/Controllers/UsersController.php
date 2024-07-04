<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
