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
        $whatsAppTemplate = 'يشرفنا حضوركم حفل {{event_name}} وذلك في {{miladi_date}} من {{from}} الى {{to}}';
        Filter::create([
            'category_id' => '1',
            'name' => 'Wedding Women',
            'name_ar' => 'زفاف النساء',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Wedding Men',
            'name_ar' => 'زفاف الرجال',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Engagement Women',
            'name_ar' => 'عقد قران النساء',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '1',
            'name' => 'Hennah',
            'name_ar' => 'الحناء',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '2',
            'name' => 'Goma',
            'name_ar' => 'غوما',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '2',
            'name' => 'L\'amour',
            'name_ar' => 'لاموغ',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '3',
            'name' => 'Boys',
            'name_ar' => 'أولاد',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '3',
            'name' => 'Girls',
            'name_ar' => 'بنات',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '3',
            'name' => 'Men',
            'name_ar' => 'رجال',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '3',
            'name' => 'Women',
            'name_ar' => 'نساء',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '5',
            'name' => 'Baby Shower',
            'name_ar' => 'جنس المولود',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '5',
            'name' => 'New Baby',
            'name_ar' => 'مولود جديد',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Aqiqah',
            'name_ar' => 'عقيقة',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Arrival of a Traveler',
            'name_ar' => 'قدوم مسافر',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Award Ceremony',
            'name_ar' => 'حفل تكريم',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Bride Reception',
            'name_ar' => 'استقبال العروس',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Eid al-Adha',
            'name_ar' => 'عيد الأضحى',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Eid al-Fitr',
            'name_ar' => 'عيد الفطر',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Evening',
            'name_ar' => 'أمسية',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Family Gathering',
            'name_ar' => 'اجتماع عائلي',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Fashion Show',
            'name_ar' => 'عرض أزياء',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Father\'s Day',
            'name_ar' => 'عيد الأب',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Gabga',
            'name_ar' => 'غبقة',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Gargeean',
            'name_ar' => 'قرقيعان',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Mother\'s Day',
            'name_ar' => 'عيد الأم',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Receptions',
            'name_ar' => 'استقبالات',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Recovery – Healing',
            'name_ar' => 'شفاء',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Retirement',
            'name_ar' => 'تقاعد',
            'whatsApp_template' => $whatsAppTemplate,
        ]);

        Filter::create([
            'category_id' => '8',
            'name' => 'Teacher\'s Day',
            'name_ar' => 'عيد المعلم',
            'whatsApp_template' => $whatsAppTemplate,
        ]);
    }
}
