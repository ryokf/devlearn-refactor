<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {

        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }
    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3',]]);
        Permission::create($validated);
        return to_route('admin.permissions.index')->with('message', 'Permission created successful');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => 'required']);
        $permission->update($validated);
        return to_route('admin.permissions.index')->with('message', 'Permission updated successful');
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
