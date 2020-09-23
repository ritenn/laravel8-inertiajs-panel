<?php

namespace Database\Seeders;

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
        $user = User::create([
            'name' => 'admin',
            'email' => 'michalplocieniak@gmail.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('123321123'),
        ]);

        $user->assignRoleByName('admin');
    }
}
