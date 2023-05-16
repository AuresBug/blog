<?php

namespace Database\Seeders;

use App\Enums\EnumRoles;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Super Admin
        $user = User::firstOrCreate(
            [
                'name' => EnumRoles::SUDO,
            ],
            [
                'email'    => 'sudo@sudo.com',
                'password' => bcrypt('password'),
            ]
        );

        $user->assignRole(EnumRoles::SUDO);

        // Admin
        $user = User::firstOrCreate(
            [
                'name' => EnumRoles::ADMIN,
            ],
            [
                'email'    => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]
        );

        $user->assignRole(EnumRoles::ADMIN);

        // User
        $user = User::firstOrCreate(
            [
                'name' => EnumRoles::USER,
            ],
            [
                'email'    => 'user@user.com',
                'password' => bcrypt('password'),
            ]
        );

        $user->assignRole(EnumRoles::USER);

        // User::factory(100000)->create();

    }
}
