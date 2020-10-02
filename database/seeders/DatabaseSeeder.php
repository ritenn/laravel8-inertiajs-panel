<?php

namespace Database\Seeders;

use App\Models\Role;
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
            PermissionSeeder::class,
            RoleSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class
        ]);

        $roles = Role::pluck('name');

         \App\Models\User::factory(50)->create()
         ->each(function($user) use ($roles) {
             $user->assignRoleByName($roles->shuffle()->first());
         });
    }
}
