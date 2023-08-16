<?php

namespace Database\Seeders;

use App\Models\User;
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
            'guard_name' => 'web',
        ]);
        Role::create([
            'name' => 'author',
            'guard_name' => 'web',
        ]);
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'buy course',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'create course',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'edit course',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'delete course',
            'guard_name' => 'web',
        ]);
        //permission category admin
        Permission::create([
            'name' => 'manage category',
            'guard_name' => 'web',
        ]);

        //permission voucher admin
        Permission::create([
            'name' => 'manage voucher',
            'guard_name' => 'web',
        ]);

        //permission to manage roles and permissions
        Permission::create([
            'name' => 'manage roles_permission',
            'guard_name' => 'web',
        ]);

        //permission to manage user
        Permission::create([
            'name' => 'manage user',
            'guard_name' => 'web',
        ]);

        //permission to manage course by admin
        Permission::create([
            'name' => 'manage course',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'validate transaction',
            'guard_name' => 'web',
        ]);

        for ($i = 1; $i <= 12; $i++) {
            $user = User::find($i);
            if ($i == 1) {
                $user->assignRole('author');
            } else {
                $user->assignRole('member');
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            if ($i == 1) {
                $role = Role::findById(1);
                $permission = Permission::findById(1);
                $role->givePermissionTo($permission);
            } elseif ($i == 2) {
                for ($j = 2; $j <= 4; $j++) {
                    $role = Role::findById(2);
                    $permission = Permission::findById($j);
                    $role->givePermissionTo($permission);
                }
            } elseif ($i == 3) {
                for ($j = 5; $j <= 8; $j++) {
                    $role = Role::findById(3);
                    $permission = Permission::findById($j);
                    $role->givePermissionTo($permission);
                }
            }
        }

        $admin = User::where('email', 'admin@admin.admin')->first();
        $admin->assignRole('admin');
        $adminRole = Role::findByName('admin');

        $adminRole->givePermissionTo('manage category', 'manage voucher', 'manage roles_permission', 'manage user', 'manage course');
    }
}
