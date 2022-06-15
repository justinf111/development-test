<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'name' => 'Admin'
        ]);
    }
}
