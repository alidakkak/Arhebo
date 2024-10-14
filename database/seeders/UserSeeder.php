<?php

namespace Database\Seeders;

use App\Models\User;
use App\Statuses\UserTypes;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0937356470',
            'password' => '00000000',
            'type' => UserTypes::SUPER_ADMIN,
        ]);

        User::factory()->create([
            'name' => 'Support',
            'email' => 'support@gmail.com',
            'phone' => '0937356470',
            'password' => '00000000',
            'type' => UserTypes::SUPPORT,
        ]);

        \App\Models\User::create([
            'name' => 'Ali',
            'email' => 'ali@gmail.com',
            'phone' => '0937356470',
            'password' => '00000000',
            'type' => UserTypes::USER,
        ]);
    }
}
