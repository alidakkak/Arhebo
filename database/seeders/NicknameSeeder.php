<?php

namespace Database\Seeders;

use App\Models\Nickname;
use Illuminate\Database\Seeder;

class NicknameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nickname::create([
            'nickname' => 'Honorable Male',
            'nickname_ar' => 'المكرم'
        ]);

        Nickname::create([
            'nickname' => 'Honorable Female',
            'nickname_ar' => 'المكرمة'
        ]);

        Nickname::create([
            'nickname' => 'Professor',
            'nickname_ar' => 'الأستاذ'
        ]);

        Nickname::create([
            'nickname' => 'Miss',
            'nickname_ar' => 'الأنسة'
        ]);

        Nickname::create([
            'nickname' => 'Engineer',
            'nickname_ar' => 'المهندس'
        ]);

    }
}
