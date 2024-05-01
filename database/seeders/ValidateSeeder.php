<?php

namespace Database\Seeders;

use App\Models\Validate;
use Illuminate\Database\Seeder;

class ValidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Validate::create([
            'name' => '',
            'message' => '',
            'message_ar' => '',
            'input_id' => '',
        ]);
    }
}
