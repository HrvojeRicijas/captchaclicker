<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Laratrust\Laratrust;
use Laratrust\Traits\LaratrustUserTrait;


class UserController extends Controller
{
    public function roleAdd(){
        $user = User::find(Auth::id());
        $user->attachRole('user');
        $user->save();

        return view('test',  ["user"=>$user]);
    }

    public function showUsers(){
        return view('admin.userIndex',  ["users"=>User::get(), "roles"=>Role::get(), 'currentUser'=>User::find(Auth::id())]);

    }

    public function showUser($id){
        $user = User::find($id);
        return view('admin.user',  ["user"=>$user, "roles"=>Role::get(), 'currentUser'=>User::find(Auth::id())]);

    }







    public function updateUsers($id, Request $request){
        $user = User::find($id);

        if ($request->roles) {
            $user->syncRoles($request->roles);
        }

        return redirect('/admin/users');

    }
}
