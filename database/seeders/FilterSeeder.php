<?php

namespace Database\Seeders;

use App\Models\Filter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Filter::create([
            'category_id' => '1',
            'name' => 'Wedding Men',
            'name_ar' => 'رجال الزفاف'
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Wedding woman',
            'name_ar' => 'امرأة الزفاف'
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Engagement woman',
            'name_ar' => 'امرأة الخطوبة'
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Engagement Men',
            'name_ar' => 'رجال الخطوبة'
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Henna',
            'name_ar' => 'الحناء'
        ]);
    }
}
