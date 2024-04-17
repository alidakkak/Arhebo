<?php

namespace Database\Seeders;

use App\Models\Filter;
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
            'name_ar' => 'رجال الزفاف',
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Wedding woman',
            'name_ar' => 'امرأة الزفاف',
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Engagement Men',
            'name_ar' => 'رجال الخطوبة',
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Engagement woman',
            'name_ar' => 'امرأة الخطوبة',
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Henna',
            'name_ar' => 'الحناء',
        ]);

        Filter::create([
            'category_id' => '4',
            'name' => 'Aqiqah',
            'name_ar' => 'عقيقة',
        ]);

        Filter::create([
            'category_id' => '4',
            'name' => 'Retirement',
            'name_ar' => 'التقاعد',
        ]);

        Filter::create([
            'category_id' => '4',
            'name' => 'Teacher Day',
            'name_ar' => 'يوم المعلم',
        ]);

        Filter::create([
            'category_id' => '5',
            'name' => 'New Baby',
            'name_ar' => 'طفل جديد',
        ]);

        Filter::create([
            'category_id' => '5',
            'name' => 'Baby Shower',
            'name_ar' => 'استحمام الطفل',
        ]);

        Filter::create([
            'category_id' => '4',
            'name' => 'Eid al-Adha',
            'name_ar' => 'عيد الأضحى',
        ]);
    }
}
