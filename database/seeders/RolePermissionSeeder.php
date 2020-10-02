<?php

namespace Database\Seeders;


use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();

        Permission::all()->each(function($permission) use($adminRole) {
            $adminRole->permissions()->attach($permission);
        });
    }
}
