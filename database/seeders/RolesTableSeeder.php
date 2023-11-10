<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
                'featured' => 0
            ],
            [
                'id'    => 2,
                'title' => 'User',
                'featured' => 0
            ],
        ];

        Role::insert($roles);
    }
}
