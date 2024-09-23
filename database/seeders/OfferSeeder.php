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
            'image' => '/offers_image/card 1 .png',
        ]);

        Offer::create([
            'image' => '/offers_image/card 2.png',
        ]);

        Offer::create([
            'image' => '/offers_image/card 3.png',
        ]);

        Offer::create([
            'image' => '/offers_image/card.png',
        ]);
    }
}
