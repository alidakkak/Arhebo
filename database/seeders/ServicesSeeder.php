<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Services::create([
            'title' => 'Headline 1',
            'title_ar' => 'العنوان 1',
            'body' => 'Lorem ipsum dolor sit amet
consectetur. Nunc faucibustris
tique amet amet pellentesque
pellentesque. Duis risus et
etiam gravida sagittis enim.
Tincidunt vel sit eget tincidunt
sed. Nullam ',
            'body_ar' => 'لوريم إيبسوم هو نص العنصر النائب عادة
       المستخدمة في الرسم.',
            'image' => '/services_image/17-dedicated-service.png',
        ]);
    }
}
