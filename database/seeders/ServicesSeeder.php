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
            'title' => '“Beautiful Invitations for Every Occasion”',
            'title_ar' => '“دعوات مميزة لكل مناسباتك”',
            'body' => 'Our design team is here to create stunning invitations for all your special moments.
             We work quickly and with care, ensuring your invitations are elegant and unique,
              adding a personal touch to your important day ',
            'body_ar' => 'فريقنا لتصميم الدعوات جاهز ليقدّم لك أجمل التصاميم لمختلف مناسباتك.
             نعمل بسرعة واهتمام لنضمن أن دعواتك تكون أنيقة وفريدة،
              لتُضفي طابعاً خاصاً على يومك المميز.',
            'image' => '/services_image/serviceone.webp',
        ]);
    }
}
