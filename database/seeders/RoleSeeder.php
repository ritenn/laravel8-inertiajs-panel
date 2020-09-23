<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            [
                'name' => 'admin',
                'display_name' => 'Admin'
            ],
            [
                'name' => 'client',
                'display_name' => 'Client'
            ]
        );

        foreach ($roles as $role)
        {
            Role::create($role);
        }
    }
}
