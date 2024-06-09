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
            'image' => '/categories_image/Wedding.png',
            'photo' => '/categories_image/Background - Wedding.png',
            'category_code' => '01',
        ]);

        Category::create([
            'name' => 'Business',
            'name_ar' => 'عمل',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Business.png',
            'photo' => '/categories_image/Background - Business.png',
            'category_code' => '02',
        ]);

        Category::create([
            'name' => 'Save the Date',
            'name_ar' => 'احفظ التاريخ',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Save the Date.png',
            'photo' => '/categories_image/Background - Save The Date.png',
            'category_code' => '03',
        ]);

        Category::create([
            'name' => 'Social Events',
            'name_ar' => 'الأحداث الاجتماعية',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Social Events.png',
            'photo' => '/categories_image/Background - Social Events.png',
            'category_code' => '04',
        ]);

        Category::create([
            'name' => 'baby',
            'name_ar' => 'بيبي',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/baby.png',
            'photo' => '/categories_image/Background - Baby.png',
            'category_code' => '05',
        ]);

        Category::create([
            'name' => 'Bridal Shower',
            'name_ar' => 'بريدل شوير',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Bridal Shower.png',
            'photo' => '/categories_image/Background - Bridal Shower.png',
            'category_code' => '06',
        ]);

        Category::create([
            'name' => 'Entertaining',
            'name_ar' => 'مسلية',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Entertaining.png',
            'photo' => '/categories_image/Background - Birthday.png',
            'category_code' => '07',
        ]);

        Category::create([
            'name' => 'Graduation',
            'name_ar' => 'تخرُّج',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Graduation.png',
            'photo' => '/categories_image/Background - Graduation.png',
            'category_code' => '08',
        ]);
    }
}
