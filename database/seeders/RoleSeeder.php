<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create user',
            'update user',
            'delete user',
            'read user',
            'create unit',
            'update unit',
            'delete unit',
            'read unit',
        ];

        foreach($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $roles = [
            'superadmin',
            'direktorat',
            'bagian',
            'urusan',
            'urusan-cosmos',
            'urusan-aplikasi'
        ];

        foreach($roles as $role) {
            $newRole = Role::create(['name' => $role]);

            if($role == 'superadmin'){
                $newRole->syncPermissions(Permission::all());
            }elseif($role == 'direktorat'){
                $newRole->syncPermissions(['read user', 'read unit']);
            }elseif($role == 'bagian'){
                $newRole->syncPermissions(['read user', 'read unit']);
            }elseif($role == 'urusan'){
                $newRole->syncPermissions(['read user', 'read unit']);
            }elseif($role == 'urusan-cosmos'){
                $newRole->syncPermissions(['read user', 'read unit']);
            }elseif($role == 'urusan-aplikasi'){
                $newRole->syncPermissions(['read user', 'read unit']);
            }
        }
    }
}
