<?php

namespace Database\Seeders;

use App\Models\Nickname;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NicknameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nickname::insert([
            ['nickname' => 'Honorable Male', 'nickname_ar' => 'المكرم'],  // Honorable Male
            ['nickname' => 'Honorable Female', 'nickname_ar' => 'المكرمة'],  // Honorable Female
            ['nickname' => 'Professor', 'nickname_ar' => 'الأستاذ'],  // Professor
            ['nickname' => 'Miss', 'nickname_ar' => 'الأنسة'],  // Professor
            ['nickname' => 'Engineer', 'nickname_ar' => 'المهندس'],  // Engineer
        ]);

    }
}
