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
        Storage::fake('categories_image');

        // Create a fake image file
        $image = UploadedFile::fake()->image('Wedding.png');

        // Move the fake image to the desired location and get the path
        $filePath = $image->storeAs('categories_image', 'Wedding.png', 'public');

        // Create a new category with the image
        Category::create([
            'name' => 'Wedding',
            'name_ar' => 'قِرَان',
            'description' => 'Be inspired and fall in love with our timeless Save the date invitations.',
            'description_ar' => 'كن مصدر إلهام وتقع في الحب لدينا الخالدة حفظ دعوات التاريخ.',
            'image' => $filePath,  // Use the stored file path
            'photo' => $filePath,  // Use the stored file path if needed
        ]);
    }
}
