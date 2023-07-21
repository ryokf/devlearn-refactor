<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SpatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'member',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'author',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'admin territory',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'author territory',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'member territory',
            'guard_name' => 'web'
        ]);

        for($i = 1; $i <= 10; $i++){
            $user = User::find($i);
            if($i < 4){
                $user->assignRole('author');
            } else {
                $user->assignRole('member');
            }
        }

        for($i = 1; $i <=3; $i++){
            $role = Role::findById($i);
            $permission = Permission::findById($i);
            $role->givePermissionTo($permission);
        }

        $admin = User::where('email', 'admin@admin.admin')->first();
        $admin->assignRole('admin');
    }
}
