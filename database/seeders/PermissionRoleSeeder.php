<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        $admin_permissions = $permissions->filter(function ($permission) {
            return substr($permission->title, 0, 7) != 'vendor_' && substr($permission->title, 0, 8) != 'client_';
        });
        // TODO: change 1 to Role::ROLE_ADMIN
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $client_permissions = $permissions->filter(function ($permission) {
            return substr($permission->title, 0, 7) === 'client_';
        });
        // TODO: change 1 to Role::ROLE_CLIENT
        Role::findOrFail(2)->permissions()->sync($client_permissions);
    }
}
