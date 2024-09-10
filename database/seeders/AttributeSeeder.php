<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::create([
            'package_id' => '3',
            'key' => 'withCustom',
        ]);

        Attribute::create([
            'package_id' => '3',
            'key' => 'withoutNumber',
        ]);
    }
}
