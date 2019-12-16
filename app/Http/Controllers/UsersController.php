<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index')->with('users',$users);
    }

    public function admin(User $user){

        $user->admin = 1;
        $user->save();

        Session::flash('success','User Permission Successfully');
        return redirect()->route('users.index');
    }

    public function not_admin(User $user){

        $user->admin = 0;
        $user->save();

        Session::flash('success','User Permission Successfully');
        return redirect()->route('users.index');
    }

    public function destroy(User $user){

        $user->delete();
        Session::flash('success','User '.$user->name.' Delete Successfully');
        return redirect()->route('users.index');

    }
}
