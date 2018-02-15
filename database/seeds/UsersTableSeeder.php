<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 生成数据集合
        $users = factory(User::class)
            ->times(5)
            ->make();

        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到数据库中
        User::insert($user_array);


        $lifetour = Role::create(['name' => 'lifetour']);
        $senke    = Role::create(['name' => 'senke']);
        $jidian   = Role::create(['name' => 'jidian']);

        Permission::create(['name' => 'user']);
        Permission::create(['name' => 'senke_read']);
        Permission::create(['name' => 'senke_edit']);
        Permission::create(['name' => 'jidian_read']);
        Permission::create(['name' => 'jidian_edit']);

        $lifetour->givePermissionTo('user','senke_read', 'senke_edit','jidian_read','jidian_edit');
        $senke->givePermissionTo('senke_read');
        $jidian->givePermissionTo('jidian_read');

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'JaxZhu';
        $user->email = 'zhuhuayu@lifetour.com.cn';
        $user->assignRole('lifetour');
        $user->save();

        // 单独处理第二个用户的数据
        $user = User::find(2);
        $user->name = 'SENKE';
        $user->email = 'senke@lifetour.com.cn';
        $user->assignRole('senke');
        $user->save();



        // 单独处理第三个用户的数据
        $user = User::find(3);
        $user->name = 'JIDIAN';
        $user->email = 'jidian@lifetour.com.cn';
        $user->assignRole('jidian');
        $user->save();

    }
}
