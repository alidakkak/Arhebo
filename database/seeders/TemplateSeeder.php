<?php

namespace Database\Seeders;

use App\Models\FilterTemplate;
use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Template::$isSeederRunning = true;

        $templates = [
            [
                'title' => 'Gold leaf',
                'title_ar' => 'أوراق الذهب',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0001',
                'category_id' => '1',
                'image' => '/templates_image/Wedding Men/Wedding Men - Gold leaf - 1.png',
                'filter_id' => '1'
            ],
            [
                'title' => 'Gold Stars',
                'title_ar' => 'النجوم الذهبية',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0002',
                'category_id' => '1',
                'image' => '/templates_image/Wedding Men/Wedding Men - Gold Stars - 2.png',
                'filter_id' => '1'
            ],
            [
                'title' => 'Elegant Triangle',
                'title_ar' => 'المثلث الأنيق',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0003',
                'category_id' => '1',
                'image' => '/templates_image/Wedding Men/Wedding Men - Elegant Triangle - 3.png',
                'filter_id' => '1'
            ],
            [
                'title' => 'Gold flowers',
                'title_ar' => 'زهور ذهبية',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0004',
                'category_id' => '1',
                'image' => '/templates_image/Wedding Men/Wedding Men - Gold flowers - 4.png',
                'filter_id' => '1'
            ],
            [
                'title' => 'Silver Leaf',
                'title_ar' => 'ورقة فضية',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0005',
                'category_id' => '1',
                'image' => '/templates_image/Wedding Men/Wedding Men - Silver Leaf - 5.png',
                'filter_id' => '1'
            ],
        ];

        foreach ($templates as $data) {
            $template = Template::create([
                'title' => $data['title'],
                'title_ar' => $data['title_ar'],
                'description' => $data['description'],
                'description_ar' => $data['description_ar'],
                'template_code' => $data['template_code'],
                'category_id' => $data['category_id'],
                'image' => $data['image'],
            ]);

            if ($template && isset($data['filter_id'])) {
                FilterTemplate::create([
                    'template_id' => $template->id,
                    'filter_id' => $data['filter_id']
                ]);
            }
        }


    }
}
