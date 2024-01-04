<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }
    public function add_post(Request $request)
    {
        $user = Auth->user();
        user_id = $user->id;
        name = $user->name;
        usertype = $user->usertype;



    }
}
