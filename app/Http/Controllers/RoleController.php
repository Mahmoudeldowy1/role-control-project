<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',['roles'=>$roles]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create' , ['permissions'=>$permissions]);
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());

        foreach (request('permissions') as $key=>$value)
        {
            $role->attachPermission($value);
        }

        session()->flash('role-created-message','role with Name '.request('name') . ' was created');
        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit' , [
            'role'=>$role,
            'permissions'=>$permissions
        ]);
    }

    public function update(RoleRequest $request,Role $role)
    {
        $role->update($request->validated());

        DB::table('permission_role')->where('role_id',$role->id)->delete();
        foreach (request('permissions') as $key => $value) {
            $role->attachPermission($value);
        }

        session()->flash('role-updated-message','Role with Name '.request('name') . ' was Updated');
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('role-deleted-message','role was Deleted');
        return redirect()->route('roles.index');
    }
}
