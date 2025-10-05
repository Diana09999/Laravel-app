<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create dishes',
            'delete dishes',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($permissions);

        $userRole = Role::create(['name' => 'user']);

        $admin = User::where('email', 'admin@test.com')->first();
        if ($admin) {
            $admin->assignRole('admin');
        }

        $users = User::where('email', '!=', 'admin@test.com')->get();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
