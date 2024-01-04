<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }
}
