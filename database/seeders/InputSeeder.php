<?php

namespace Database\Seeders;

use App\Models\Input;
use Illuminate\Database\Seeder;

class InputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Input::create([
            'input_name' => 'Grooms name',
            'input_name_ar' => 'اسم العريس',
            'placeholder' => 'Ali',
            'placeholder_ar' => 'علي',
            'category_id' => '1',
        ]);

<<<<<<< HEAD
=======

>>>>>>> a5a9f5502020d7f839385627f28c0e4d99e971c5
        Input::create([
            'input_name' => 'Brides name',
            'input_name_ar' => 'اسم العروس',
            'placeholder' => 'Rama',
            'placeholder_ar' => 'راما',
            'category_id' => '1',
        ]);
    }
}
