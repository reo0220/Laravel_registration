<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as PostRequest;

class UsersController extends Controller
{
    public function regist()
    {
        return view('regist');
    }

    public function regist_post()
    {
        $family_name = PostRequest::input('family_name');
        return view('regist_confirm', compact('family_name'));

        $last_name = PostRequest::input('last_name');
        return view('regist_confirm', compact('last_name'));

    }
}
