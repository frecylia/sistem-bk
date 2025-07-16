<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Permissions
        $permissions = [
            'dashboard',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create Roles
        $siswaRole = Role::create(['name' => 'Siswa']);
        $adminRole = Role::create(['name' => 'Admin']);

        // Assign Permissions to Roles
        $siswaRole->givePermissionTo([
            'dashboard',
        ]);
        $adminRole->givePermissionTo(Permission::all());

        // Create Default Users
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),           
        ]);
        $admin->assignRole('Admin');

        $siswa = User::create([
            'name' => 'Siswa Sisil',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('password'),
            'nis' => 'SIS001',
            'kelas' => '12 IPS 1',
            'jurusan' => 'IPS',
        ]);
        $siswa->assignRole('Siswa');

    }
}
