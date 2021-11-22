<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // PermissionsSeeder::class,
            // RolesSeeder::class,
            PermissionRoleSeeder::class,
            // UsersSeeder::class,
            // RoleUserSeeder::class,
            // SubscriptionSeeder::class,
            // SubscriptionUserSeeder::class,
            // OrderSeeder::class,
            // CreateLanguages::class,
            // SettingsTableSeeder::class,
            // CreateSections::class
        ]);
    }
}
