<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    { 
       

        return view('admin.users.index');
    }

    public function show(User $user)
    {
        $roles = Role::all()->where('name', '!=', 'user');
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

      if($request->role == 'admin'){
        $user->removeRole('cashier');
      }elseif($request->role == 'cashier'){
        $user->removeRole('admin');
      }

        $user['isEmployee'] = 1;
        $user->assignRole($request->role)->update();
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {

        if ($user->hasRole($role)) {
            $user['isEmployee'] = 0;
            $user->removeRole($role)->update();
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
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
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'you are admin.');
        }
        $user->delete();

        return back()->with('message', 'User deleted.');
    }
}