<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Wedding',
            'name_ar' => 'قِرَان',
            'description' => 'Be inspired and fall in love with
our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب
لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => '/categories_image/Wedding.png',
            'photo' => '/categories_image/Categories Background - Save The Date.png',
        ]);
    }
}
