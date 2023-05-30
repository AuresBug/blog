<?php

namespace Database\Seeders;

use App\Enums\EnumRoles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'users' => ['index', 'create', 'show', 'edit', 'destroy'],
            'roles' => ['index', 'create', 'show', 'edit', 'destroy'],
            'posts' => ['index', 'create', 'show', 'edit', 'destroy'],
        ];

        foreach ($permissions as $model => $methods) {
            foreach ($methods as $method) {
                Permission::firstOrcreate([
                    'name' => $model . '.' . $method,
                ]);
            }
        }

        // Super Admin
        Role::firstOrCreate(['name' => EnumRoles::SUDO]);

        // Admin
        Role::firstOrCreate(['name' => EnumRoles::ADMIN]);

        // User
        Role::firstOrCreate(['name' => EnumRoles::USER]);

    }
}
