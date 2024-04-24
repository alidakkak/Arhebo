<?php

namespace Database\Seeders;

use App\Models\Input;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Input::create([
            'input_name' => 'The child name',
            'input_name_ar' => 'اسم الطفل',
            'placeholder' => 'Ali',
            'placeholder_ar' => 'علي',
            'category_id' => '',
        ]);
    }
}
