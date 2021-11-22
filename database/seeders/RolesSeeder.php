<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => Role::ROLE_ADMIN,
            ],
            [
                'id'    => 2,
                'title' => Role::ROLE_VENDOR,
            ],
            [
                'id'    => 3,
                'title' => Role::ROLE_CLIENT,
            ],
        ];

        Role::insert($roles);
    }
}
