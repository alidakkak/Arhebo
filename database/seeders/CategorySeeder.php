<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::$isSeederRunning = true;

        Category::create([
            'name' => 'Wedding',
            'name_ar' => 'قِرَان',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Wedding.jpg',
            'photo' => '/categories_image/Background - Wedding.png',
            'category_code' => '01',
            'whatsApp_template' => 'يشرفنا حضوركم حفل {{event_name}} وذلك في {{miladi_date}} من {{from}} الى {{to}}',
        ]);

        Category::create([
            'name' => 'Business',
            'name_ar' => 'عمل',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Business.jpg',
            'photo' => '/categories_image/Background - Business.png',
            'category_code' => '02',
            'whatsApp_template' => 'يشرفنا حضوركم حفل {{event_name}} وذلك في {{miladi_date}} من {{from}} الى {{to}}',
        ]);

        Category::create([
            'name' => 'Birthday',
            'name_ar' => 'أعياد الميلاد',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Birthday.jpg',
            'photo' => '/categories_image/Background - Graduation.png',
            'category_code' => '03',
            'whatsApp_template' => 'يشرفنا حضوركم حفل {{event_name}} وذلك في {{miladi_date}} من {{from}} الى {{to}}',
        ]);

        Category::create([
            'name' => 'Save the Date',
            'name_ar' => 'احفظ التاريخ',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Save The Date.jpg',
            'photo' => '/categories_image/Background - Save The Date.png',
            'category_code' => '04',
            'whatsApp_template' => 'يشرفنا حضوركم حفل {{event_name}} وذلك في {{miladi_date}} من {{from}} الى {{to}}',
        ]);

        Category::create([
            'name' => 'Baby',
            'name_ar' => 'مولود ',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/baby.jpg',
            'photo' => '/categories_image/Background - Baby.png',
            'category_code' => '05',
            'whatsApp_template' => 'يشرفنا حضوركم حفل {{event_name}} وذلك في {{miladi_date}} من {{from}} الى {{to}}',
        ]);

        Category::create([
            'name' => 'Bridal Shower',
            'name_ar' => 'توديع العزوبية',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Bridal Shower.jpg',
            'photo' => '/categories_image/Background - Bridal Shower.png',
            'category_code' => '06',
            'whatsApp_template' => 'يشرفنا حضوركم حفل {{event_name}} وذلك في {{miladi_date}} من {{from}} الى {{to}}',
        ]);

        Category::create([
            'name' => 'Graduation',
            'name_ar' => 'تخرُّج',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Graduation.jpg',
            'photo' => '/categories_image/Background - Graduation.png',
            'category_code' => '07',
            'whatsApp_template' => 'يشرفنا حضوركم حفل {{event_name}} وذلك في {{miladi_date}} من {{from}} الى {{to}}',
        ]);

        Category::create([
            'name' => 'Entertainment',
            'name_ar' => 'الترفيه',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Entertaining.jpg',
            'photo' => '/categories_image/Background - Birthday.png',
            'category_code' => '08',
            'whatsApp_template' => 'يشرفنا حضوركم حفل {{event_name}} وذلك في {{miladi_date}} من {{from}} الى {{to}}',
        ]);
    }
}
