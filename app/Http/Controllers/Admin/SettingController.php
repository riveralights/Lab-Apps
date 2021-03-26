<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class SettingController extends Controller
{
    public function index()
    {
        $users = User::get();
        $roles = Auth::user()->getRoleNames();
        return view('pages.admin.setting.index', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function edit ($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        $permissions = Permission::get();
        return view('pages.admin.setting.edit', [
            'user' => $user,
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $roleName = $user->getRoleNames();
        $permissionName = $user->permissions;
        
        if($roleName)
        {
            $user->removeRole($roleName[0]);
            $user->revokePermissionTo($permissionName);
        }
        
        $data = $request->all();
        $role = Role::findById($data['role']);

        if(count($data['permission']) > 0 ) {
            foreach($data['permission'] as $key => $value) {
                $user->givePermissionTo($data['permission'][$key]);
                $user->assignRole($role);
                $role->givePermissionTo($data['permission'][$key]);
            }
        }

        return redirect()->route('setting.index')->with('success', 'Role dan Permission user berhasil di update');
    }
}
