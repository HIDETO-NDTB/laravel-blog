<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{
    public function index(){

        return view('users.profile')->with('user',Auth::user());
    }

    public function update(Request $request){
        //validation
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'linkedin' => 'required',
        ]);

        //update data into database
        $user = Auth::user();
        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            Storage::disk('public')->put($avatar_new_name,file_get_contents($avatar));
            $user->profile->avatar = 'Storage/'.$avatar_new_name;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->about = $request->about;
        $user->profile->facebook = $request->facebook;
        $user->profile->linkedin = $request->linkedin;

        $user->save();
        $user->profile->save();

        if($request->has('password')){
            $user->password = bcrypt($request->password);
            $user->save();

        }

        //return redirect back
        Session::flash('success','Profile Updated successfully');
        return redirect()->back();
    }
}
