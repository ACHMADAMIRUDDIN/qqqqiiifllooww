<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Buat role
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        // Buat permission (optional)
        Permission::create(['name' => 'manage pasien']);
        Permission::create(['name' => 'view layanan']);

        // Assign permission ke role
        $admin->givePermissionTo('manage pasien');
        $user->givePermissionTo('view layanan');

        // Assign role ke user
        $adminUser = User::where('email', 'admin@example.com')->first();
        if ($adminUser) {
            $adminUser->assignRole('admin');
        }
    }
}
