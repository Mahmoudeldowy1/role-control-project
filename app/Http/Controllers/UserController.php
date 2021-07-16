<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index',[
            'users'=>$users,
            'roles'=>$roles
        ]);
    }


    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',['roles'=>$roles]);
    }


    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        foreach (request('roles') as $key=>$value)
        {
            $user->attachRole($value);
        }

        session()->flash('user-created-message','User with Name '.request('name') . ' was created');
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit',[
            'user'=>$user,
            'roles'=>$roles
        ]);
    }

    public function update(UserRequest  $request , User $user)
    {
        $user->update($request->validated());

        DB::table('role_user')->where('user_id',$user->id)->delete();
        foreach (request('roles') as $key => $value) {
            $user->attachRole($value);
        }

        session()->flash('user-updated-message','User with Name '.request('name') . ' was Updated');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('user-deleted-message','user was Deleted');
        return redirect()->route('users.index');
    }
}
