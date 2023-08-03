<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // $menu = parent::$menuSidebar;
        // if (Auth::user()->hasDirectPermission('admin territory')) {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.roles.index', compact('roles', 'permissions'));


        // }
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RoleRequest $request)
    {
        Role::create($request->all());
        return to_route('admin.roles.index')->with('message', 'Role Created Succesfully');
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        return to_route('admin.roles.index')->with('message', 'Role Updated Succesfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return Redirect::back()->with('message', 'Role Deleted');
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return Redirect::back()->with('message', 'Permission Revoke');
        }
        return Redirect::back()->with('message', 'Permission not exist');
    }
}
