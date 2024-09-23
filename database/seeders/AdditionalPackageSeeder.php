<?php

namespace Database\Seeders;

use App\Models\AdditionalPackage;
use Illuminate\Database\Seeder;

class AdditionalPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdditionalPackage::create([
            'price' => 50,
            'number_of_invitees' => 5,
        ]);

        AdditionalPackage::create([
            'price' => 100,
            'number_of_invitees' => 10,
        ]);

        AdditionalPackage::create([
            'price' => 150,
            'number_of_invitees' => 15,
        ]);
    }
}
