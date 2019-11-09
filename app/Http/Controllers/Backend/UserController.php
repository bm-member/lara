<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
class UserController extends Controller
{

    public function profile()
    {
        return view('backend.user.profile');
    }

    public function edit()
    {
        return view('backend.user.edit');
    }
    public function update(Request $request)
    {
        //dd($request->all());

        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        // ], [
        //     'title.required' => 'Please fill title. ',
        //     'content.required' => 'Please fill content',

        // ]);
        $user = User::find(auth()->id());
        // $post->update($request->all());
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->hasFile('image')){
            $img= $request->file('image');
            $folder= public_path('upload/profile');
            $imgName= time().'.'.$img->getClientOriginalExtension();
            $img->move($folder,$imgName);
            $user->image=$imgName;
        }


        if (Auth::user()->password) {
            $user->password = Hash::make($request->password);
            //bcrypt($request->password);
        }//Hash::make($request->password);
        $user->save(); //null
        

        return redirect('admin/profile')->with('status', 'User was updated successfully.');
    }

}
//mi seed,view,con,side