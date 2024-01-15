<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Post;

use App\Models\dashboard;

use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function post_page()
    {
        $post = post::all();
        $dashboard = dashboard::all();
        return view('admin.post_page', compact('dashboard','post'));
    }
    public function add_post(Request $request)
    {
        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post;

        $post->title        = $request->title;
        $post->description  = $request->description;
        $post->description  = $request->description;
        $post->post_status  = 'active';
        $post->user_id      = $user_id;
        $post->name         = $name;
        $post->usertype     = $usertype;


        $imageName = time().'.'.$request->image->extension();
        $request->image->move('postimage', $imageName);
        $post->image = $imageName;

        $post->save();
        return redirect()->back()->with('message', 'post created successfully!');

    }
   

    public function admin()
    {
        $dashboard = dashboard::all();
        $post = post::all();
        $usertype=Auth()->user()->usertype;
        if($usertype=='admin')
        {
            return view('admin.home', compact('dashboard'));
        }
        else if($usertype=='user'){
            return view('admin.layout', compact('post'));
        }
        else{
            return redirect()->back();
        }
    }


    // -----------
    public function user()
    {
        $dashboard = dashboard::all();
        return view('admin.user_page', compact('dashboard'));
    }


    public function add_user(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return back();
    }

    public function all_user()
    {
        $user = User::all();
        $dashboard = dashboard::all();
        return view('admin.all_user', compact('user','dashboard'));
    }

    public function edit_page($id)
    {
        $user = User::find($id);
        $dashboard = dashboard::all();
        return view('admin.edit_page', compact('user','dashboard'));
    }

    public function edit_user(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;

        $user->save();
        return back();
    }




    public function settings_page ()
    {
        $dashboard = new dashboard;
        $dashboard2 = dashboard::all();
        return view('admin.settings_page', compact('dashboard','dashboard2'));
    }
    public function settings (Request $request)
    {
        $dashboard = new dashboard;
        $dashboard->title = $request->title;
        $dashboard->profile_pic = "no";

        $iconName = time().'.'.$request->favicon->extension();
        $request->favicon->move('favicon', $iconName);
        $dashboard->favicon = $iconName;

        $logoname = time().'.'.$request->logo->extension();
        $request->logo->move('logo', $logoname);
        $dashboard->logo = $logoname;

        $dashboard->save();
        return back();
    }
}
