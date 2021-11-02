<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => now(),
            ],
        );
    }
}
