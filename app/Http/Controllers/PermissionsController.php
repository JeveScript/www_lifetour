<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsController extends Controller
{
    public function index(Role $role, Permission $permission)
    {
        $roles = $role::all()->load('permissions');
        $permissions = $permission::all();
        return view('users.role', compact('roles', 'permissions'));
    }

    public function roleStore(Request $request){
        $name = $request->name;
        if(!$name){
            return redirect()->back()->with('danger', '角色不能为空');
        }

        Role::create(['name' => $name]);
        return redirect()->back()->with('success', '角色创建成功！');
    }

    public function permissionStore(Request $request){
        $name = $request->name;
        if(!$name){
            return redirect()->back()->with('danger', '权限不能为空');
        }

        permission::create(['name' => $name]);
        return redirect()->back()->with('success', '权限创建成功！');
    }

    public function roleAndPermission(Request $request){
        $data_role = $request->role;
        $data_permissions = $request->permissions;

        if(!$data_role){
            return redirect()->back()->with('danger', '请选择角色');
        }

        if(!$data_permissions){
            return redirect()->back()->with('danger', '请选择权限');
        }

        $role = Role::findByName($data_role);
        $role->syncPermissions($data_permissions);

        return redirect()->back()->with('success', '权限绑定成功！');
    }
}
