<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(7);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function giveRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return Redirect::back()->with('message', 'Role Exist');
        }
        $user->assignRole($request->role);

        return Redirect::back()->with('message', 'Role assigned');
    }

    public function revokeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);

            return Redirect::back()->with('message', 'Role Revoke');
        }

        return Redirect::back()->with('message', 'Role not exist');
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);

        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);

            return Redirect::back()->with('message', 'Permission Revoke');
        }

        return Redirect::back()->with('message', 'Permission not exist');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::back()->with('message', 'User Deleted Succesfully');
    }
}
