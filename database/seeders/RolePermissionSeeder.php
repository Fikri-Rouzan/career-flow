<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage categories',
            'manage company',
            'manage jobs',
            'manage candidates',
            'apply job',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $employerRole = Role::firstOrCreate([
            'name' => 'employer'
        ]);

        $employerPermissions = [
            'manage company',
            'manage jobs',
            'manage candidates',
        ];

        $employerRole->syncPermissions($employerPermissions);

        $employeeRole = Role::firstOrCreate([
            'name' => 'employee'
        ]);

        $employeePermissions = [
            'apply job',
        ];

        $employeeRole->syncPermissions($employeePermissions);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $name = env('SUPER_ADMIN_NAME');
        $email = env('SUPER_ADMIN_EMAIL');
        $password = env('SUPER_ADMIN_PASSWORD');

        if (!$name || !$email || !$password) {
            $this->command->error('The SUPER_ADMIN_NAME, SUPER_ADMIN_EMAIL, or SUPER_ADMIN_PASSWORD variables are not set in the .env file.');

            return;
        }

        $user = User::create([
            'name' => $name,
            'avatar' => 'images/avatar.png',
            'occupation' => 'Super Admin',
            'experience' => 100,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
        $user->assignRole($superAdminRole);
    }
}
