<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;

// use Auth;

class UsersController extends Controller
{
    public function index(User $user, Role $role)
    {
        $roles = $role::all();
        $users = $user->get();
        return view('users.index', compact('users','roles'));
    }

    public function edit(User $user, Role $role){
        $roles = $role::all();
        return view('users.edit', compact('user','roles'));
    }

    public function store(UserRequest $request, User $user)
    {
        $user_data = $request->all();
        $user_data['password'] = bcrypt($request->password);
        $user_data['role'] = $request->role;

        DB::beginTransaction();
        try {
            $user->fill($user_data);
            $user->save();
            DB::commit();
            
            if($user_data['role']){
                $user->syncRoles($user_data['role']);
                DB::commit();
            }

        } catch (\Exception $e) {
            DB::rollBack(); 
            throw $e;
        }

        return redirect()->back()->with('success', '用户创建新成功！');
    }

    public function update(Request $request, User $user)
    {

        $user_data = [];
        $user_data['name'] = $request->name;
        $user_data['role'] = $request->role;

        if(!$user_data['name']){
            return redirect()->back()->with('danger', '用户名不能为空');
        }   
        if($request['password']){
            $user_data['password'] = bcrypt($request->password);
        }

        DB::beginTransaction();
        try {
            if($user_data['role']){
                $user->syncRoles($user_data['role']);
                DB::commit();
            }

            $user->update($user_data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack(); 
            throw $e;
        }

        return redirect()->route('users.index')->with('success', '个人资料更新成功！');
    }

    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack(); 
            throw $e;
        }
        return redirect()->back()->with('success', '用户删除新成功！');;
    }

}
