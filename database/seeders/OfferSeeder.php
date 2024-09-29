<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Offer::create([
            'image' => '/offers_image/card1.jpg',
        ]);

        Offer::create([
            'image' => '/offers_image/card2.jpg',
        ]);

        Offer::create([
            'image' => '/offers_image/card3.jpg',
        ]);

        Offer::create([
            'image' => '/offers_image/card4.jpg',
        ]);

        Offer::create([
            'image' => '/offers_image/card5.jpg',
        ]);
    }
}
