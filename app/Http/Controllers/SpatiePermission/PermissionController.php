<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        Permission::create($request->all());

        return to_route('admin.roles.index')->with('message', 'Permission created successful');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();

        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return to_route('admin.roles.index')->with('message', 'Permission updated successful');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return Redirect::back()->with('message', 'Permission Deleted');
    }

    public function giveRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return Redirect::back()->with('message', 'Role Exist');
        }
        $permission->assignRole($request->role);

        return Redirect::back()->with('message', 'Role assigned');
    }

    public function revokeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);

            return Redirect::back()->with('message', 'Role Revoke');
        }

        return Redirect::back()->with('message', 'Role not exist');
    }
}
