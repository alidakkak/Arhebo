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
            'name' => 'Wedding Women',
            'name_ar' => 'زفاف النساء',
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Wedding Men',
            'name_ar' => 'زفاف الرجال',
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Engagement woman',
            'name_ar' => 'عقد قران النساء',
        ]);

        //        Filter::create([
        //            'category_id' => '1',
        //            'name' => 'Engagement Men',
        //            'name_ar' => 'رجال الخطوبة',
        //        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Henna',
            'name_ar' => 'الحناء',
        ]);

        Filter::create([
            'category_id' => '2',
            'name' => 'Goma',
            'name_ar' => 'غوما',
        ]);

        Filter::create([
            'category_id' => '2',
            'name' => 'Lamour',
            'name_ar' => 'لاموغ',
        ]);

        Filter::create([
            'category_id' => '3',
            'name' => 'Boys',
            'name_ar' => 'أولاد',
        ]);

        Filter::create([
            'category_id' => '3',
            'name' => 'Girls',
            'name_ar' => 'بنات',
        ]);

        Filter::create([
            'category_id' => '3',
            'name' => 'Men',
            'name_ar' => 'رجال',
        ]);

        Filter::create([
            'category_id' => '3',
            'name' => 'Women',
            'name_ar' => 'نساء',
        ]);

        Filter::create([
            'category_id' => '5',
            'name' => 'Baby Shower',
            'name_ar' => 'جنس المولود',
        ]);

        Filter::create([
            'category_id' => '5',
            'name' => 'New Baby',
            'name_ar' => 'مولود جديد',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Aqiqah',
            'name_ar' => 'عقيقة',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Arrival of a Traveler',
            'name_ar' => 'قدوم مسافر',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Award Ceremony',
            'name_ar' => 'حفل تكريم',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Bride Reception',
            'name_ar' => 'استقبال العروس',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Eid al-Adha',
            'name_ar' => 'عيد الأضحى',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Eid al-Fitr',
            'name_ar' => 'عيد الفطر',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Evening',
            'name_ar' => 'أمسية',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Family Gathering',
            'name_ar' => 'اجتماع عائلي',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Fashion Show',
            'name_ar' => 'عرض أزياء',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Father\'s Day',
            'name_ar' => 'عيد الأب',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Gabga',
            'name_ar' => 'غبقة',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Gargeean',
            'name_ar' => 'قرقيعان',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Mothers Day',
            'name_ar' => 'عيد الأم',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Receptions',
            'name_ar' => 'استقبالات',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Recovery – Healing',
            'name_ar' => 'شفاء',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Retirement',
            'name_ar' => 'تقاعد',
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Teachers Day',
            'name_ar' => 'عيد المعلم',
        ]);

    }
}
