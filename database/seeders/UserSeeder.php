<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Superadmin
        $user = User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin',
            'password' => Hash::make('password'),
        ]);
        $role = Role::where('name', 'superadmin')->first();
        $user->assignRole($role);

        //Direktorat
        $user = User::create([
            'name' => 'Direktorat Pusat Teknologi Informasi',
            'username' => 'direktorat-pusat',
            'email' => 'direktorat@localhost',
            'password' => Hash::make('password'),
        ]);
        $role = Role::where('name', 'direktorat')->first();
        $user->assignRole($role);

        //Bagian
        $user = User::create([
            'name' => 'Bagian Riset dan Layanan TI',
            'username' => 'bagian-riset',
            'email' => 'bagian@localhost',
            'password' => Hash::make('password'),
        ]);
        $role = Role::where('name', 'bagian')->first();
        $user->assignRole($role);

        //Urusan
        $user = User::create([
            'name' => 'Urusan Riset dan Layanan TI',
            'username' => 'urusan-riset',
            'email' => 'urusan@localhost',
            'password' => Hash::make('password'),
            'unit_id' => 1,
        ]);
        $role = Role::where('name', 'urusan')->first();
        $user->assignRole($role);
    }
}
