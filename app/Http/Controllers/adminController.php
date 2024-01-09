<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function admin()
    {
        $usertype=Auth()->user()->usertype;
        if($usertype=='admin')
        {
            return view('admin.home');
        }
        else if($usertype=='user'){
            return view('admin.layout');
        }
        else{
            return redirect()->back();
        }
    }


    // -----------
    public function user()
    {
        return view('admin.user_page');
    }
    public function add_user(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->usertype = $request->usertype;
    }

    public function all_user()
    {
        $user = User::all();
        return view('admin.all_user', compact('user'));
    }
    public function edit_page($id)
    {
        $user = User::find($id);
        
        return view('admin.edit_page', compact('user'));
    }
    public function edit_user(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;

        $user->save();
        return redirect()->back();
    }


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
