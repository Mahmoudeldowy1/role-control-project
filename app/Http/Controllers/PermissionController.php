<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index',['permissions'=>$permissions]);
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        Permission::create($request->validated());
        session()->flash('permission-created-message','permission with Name '.request('name') . ' was created');
        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit' , ['permission'=>$permission]);
    }

    public function update(PermissionRequest $request,Permission $permission)
    {
        $permission->update($request->validated());
        session()->flash('permission-updated-message','Permission with Name '.request('name') . ' was Updated');
        return redirect()->route('permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        session()->flash('permission-deleted-message','permission was Deleted');
        return redirect()->route('permissions.index');
    }
}
