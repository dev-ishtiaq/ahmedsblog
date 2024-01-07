<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }
    public function add_post(Request $request)
    {
        $user = Auth->user();
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->description = $request->description;

        $imageName = time().'.'.$request->image->extension();
        $request->image->move('postImage', $imagename);
        $post->image = $imageName;
    }
}
