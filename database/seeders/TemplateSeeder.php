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
            [
                'title' => 'Lovely blossom plum',
                'title_ar' => 'زهر البرقوق الجميل',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0006',
                'category_id' => '1',
                'image' => '/templates_image/Wedding woman/Wedding woman - Lovely blossom plum  - 1.png',
                'filter_id' => '2'
            ],
            [
                'title' => 'Shy love',
                'title_ar' => 'حب خجول',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0007',
                'category_id' => '1',
                'image' => '/templates_image/Wedding woman/Wedding woman -Shy love - 2.png',
                'filter_id' => '2'
            ],
            [
                'title' => 'Warm winter',
                'title_ar' => 'الشتاء دافئ',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0008',
                'category_id' => '1',
                'image' => '/templates_image/Wedding woman/Wedding woman - warm winter - 3.png',
                'filter_id' => '2'
            ],
            [
                'title' => 'Blue Jasmine',
                'title_ar' => 'الياسمين الأزرق',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0009',
                'category_id' => '1',
                'image' => '/templates_image/Wedding woman/Wedding woman - Blue Jasmine - 4.png',
                'filter_id' => '2'
            ],
            [
                'title' => 'Sultan',
                'title_ar' => 'سلطان',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0010',
                'category_id' => '1',
                'image' => '/templates_image/Wedding woman/Wedding woman - Sultan - 5.png',
                'filter_id' => '2'
            ],
            [
                'title' => 'Dahlia',
                'title_ar' => 'الداليا',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0011',
                'category_id' => '1',
                'image' => '/templates_image/Engagement Men/Engagment  Men - Dahlia -1 .png',
                'filter_id' => '3'
            ],
            [
                'title' => 'Masterpiece',
                'title_ar' => 'تحفة',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0012',
                'category_id' => '1',
                'image' => '/templates_image/Engagement Men/Engagment  Men - Masterpiece  - 2.png',
                'filter_id' => '3'
            ],
            [
                'title' => 'Black Roze',
                'title_ar' => 'بلاك روز',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0013',
                'category_id' => '1',
                'image' => '/templates_image/Engagement Men/Engagment  Men - Black Roze - 3.png',
                'filter_id' => '3'
            ],
            [
                'title' => 'Dreamy Gold',
                'title_ar' => 'حالمة الذهب',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0014',
                'category_id' => '1',
                'image' => '/templates_image/Engagement Men/Engagment  Men - Dreamy Gold - 4.png',
                'filter_id' => '3'
            ],
            [
                'title' => 'Imaginary Love',
                'title_ar' => 'الحب الخيالي',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0015',
                'category_id' => '1',
                'image' => '/templates_image/Engagement Men/Engagment  Men - Imaginary Love - 5.png',
                'filter_id' => '3'
            ],
            [
                'title' => 'Warm green',
                'title_ar' => 'أخضر دافئ',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0016',
                'category_id' => '1',
                'image' => '/templates_image/Engagement woman/Engagement woman - Warm green - 1 .png',
                'filter_id' => '4'
            ],
            [
                'title' => 'Autumn leaf',
                'title_ar' => 'ورقة الخريف',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0017',
                'category_id' => '1',
                'image' => '/templates_image/Engagement woman/Engagement woman - Autumn leaf - 2 .png',
                'filter_id' => '4'
            ],
            [
                'title' => 'Cherry love',
                'title_ar' => 'الكرز الحب',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0018',
                'category_id' => '1',
                'image' => '/templates_image/Engagement woman/Engagement woman -Cherry love - 3 .png',
                'filter_id' => '4'
            ],
            [
                'title' => 'lovely pink',
                'title_ar' => 'وردي جميل',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0019',
                'category_id' => '1',
                'image' => '/templates_image/Engagement woman/Engagement woman - lovely pink - 4 .png',
                'filter_id' => '4'
            ],
            [
                'title' => 'Love Gate',
                'title_ar' => 'بوابة الحب',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0020',
                'category_id' => '1',
                'image' => '/templates_image/Engagement woman/Engagement woman - Love Gate - 5 .png',
                'filter_id' => '4'
            ],
            [
                'title' => 'Soft Ornaments',
                'title_ar' => 'الحلي الناعمة',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0021',
                'category_id' => '1',
                'image' => '/templates_image/Henna/Henna - Soft Ornaments - 1 .png',
                'filter_id' => '5'
            ],
            [
                'title' => 'Beautiful hands',
                'title_ar' => 'أيدي جميلة',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0022',
                'category_id' => '1',
                'image' => '/templates_image/Henna/Henna - Beautiful hands - 2 .png',
                'filter_id' => '5'
            ],
            [
                'title' => 'Delicate decoration',
                'title_ar' => 'زخرفة حساسة',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0023',
                'category_id' => '1',
                'image' => '/templates_image/Henna/Henna - Delicate decoration - 3 .png',
                'filter_id' => '5'
            ],
            [
                'title' => 'Wave of love',
                'title_ar' => 'موجة الحب',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0024',
                'category_id' => '1',
                'image' => '/templates_image/Henna/Henna - Wave of love - 4 .png',
                'filter_id' => '5'
            ],
            [
                'title' => 'Rose decoration',
                'title_ar' => 'زخرفة الورد',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0025',
                'category_id' => '1',
                'image' => '/templates_image/Henna/Henna - Rose decoration - 5 .png',
                'filter_id' => '5'
            ],
            [
                'title' => 'Elegant Pattern',
                'title_ar' => 'نمط أنيق',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0026',
                'category_id' => '2',
                'image' => '/templates_image/Business/Business - Elegant Pattern - 1 .png',
            ],
            [
                'title' => 'Arabic Calligraphy',
                'title_ar' => 'الخط العربي',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0027',
                'category_id' => '2',
                'image' => '/templates_image/Business/Business - Arabic Calligraphy - 2 .png',
            ],
            [
                'title' => 'Arabic Letters',
                'title_ar' => 'الحروف العربية',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0028',
                'category_id' => '2',
                'image' => '/templates_image/Business/Business - Arabic Letters - 3 .png',
            ],
            [
                'title' => 'Lettering',
                'title_ar' => 'حروف',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0029',
                'category_id' => '2',
                'image' => '/templates_image/Business/Business - Lettering - 4 .png',
            ],
            [
                'title' => 'Arabian art',
                'title_ar' => 'الفن العربي',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0030',
                'category_id' => '2',
                'image' => '/templates_image/Business/Business - Arabian art - 5 .png',
            ],
            [
                'title' => 'Islamic pattern',
                'title_ar' => 'النمط الإسلامي',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0031',
                'category_id' => '2',
                'image' => '/templates_image/Business/Business - Islamec pattern - 7 .png',
            ],
            [
                'title' => 'Floral Decoration',
                'title_ar' => 'زخرفة الأزهار',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0032',
                'category_id' => '2',
                'image' => '/templates_image/Business/Business - Floral Decoration- 8 .png',
            ],
            [
                'title' => 'Confident navy blue',
                'title_ar' => 'ثقة باللون الأزرق الداكن',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0033',
                'category_id' => '2',
                'image' => '/templates_image/Business/Business - Confident navy blue - 9 .png',
            ],
            [
                'title' => 'Luxurious Technology',
                'title_ar' => 'التكنولوجيا الفاخرة',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0034',
                'category_id' => '2',
                'image' => '/templates_image/Business/Business - Luxurious Technology - 10 .png',
            ],
            [
                'title' => 'Revival',
                'title_ar' => 'إحياء',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0035',
                'category_id' => '3',
                'image' => '/templates_image/Save the date/Save the date - Revival - 1 .png',
            ],
            [
                'title' => 'Pastel Pink',
                'title_ar' => 'الباستيل الوردي',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0036',
                'category_id' => '3',
                'image' => '/templates_image/Save the date/Save the date - Pastel Pink - 2 .png',
            ],
            [
                'title' => 'Merlot',
                'title_ar' => 'ميرلوت',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0037',
                'category_id' => '3',
                'image' => '/templates_image/Save the date/Save the date - Merlot - 3 .png',
            ],
            [
                'title' => 'Watercolor Love',
                'title_ar' => 'الحب بالألوان المائية',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0038',
                'category_id' => '3',
                'image' => '/templates_image/Save the date/Save the date - Watercolor Love - 4 .png',
            ],
            [
                'title' => 'Puce',
                'title_ar' => 'رقاقة',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0039',
                'category_id' => '3',
                'image' => '/templates_image/Save the date/Save the date - Puce - 5 .png',
            ],
            [
                'title' => 'Turkish roze',
                'title_ar' => 'روز تركي',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0040',
                'category_id' => '3',
                'image' => '/templates_image/Save the date/Save the date - Turkish roze - 6 .png',
            ],
            [
                'title' => 'Happy Day',
                'title_ar' => 'يوم سعيد',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0041',
                'category_id' => '3',
                'image' => '/templates_image/Save the date/Save the date - Happy Day - 7.png',
            ],
            [
                'title' => 'Tales',
                'title_ar' => 'حكايات',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0042',
                'category_id' => '3',
                'image' => '/templates_image/Save the date/Save the date - Tales - 8.png',
            ],
            [
                'title' => 'Whisper',
                'title_ar' => 'همسة',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0043',
                'category_id' => '3',
                'image' => '/templates_image/Save the date/Save the date - Whisper - 9 .png',
            ],
            [
                'title' => 'a whisper of love',
                'title_ar' => 'همسة حب',
                'description' => 'Dark theme with Pink flower',
                'description_ar' => 'موضوع الظلام مع زهرة وردية',
                'template_code' => '0044',
                'category_id' => '3',
                'image' => '/templates_image/Save the date/Save the date - a whisper of love - 10.png',
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
