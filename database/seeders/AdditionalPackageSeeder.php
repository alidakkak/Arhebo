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
        AdditionalPackage::insert([
            ['price' => 50, 'number_of_invitees' => 5],
            ['price' => 100, 'number_of_invitees' => 10],
            ['price' => 150, 'number_of_invitees' => 15],
            ['price' => 200, 'number_of_invitees' => 20],
        ]);
    }
}
