<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\PackageFeature;
use Illuminate\Database\Seeder;

class FeatursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feature = Feature::create([
            'name' => 'One-day entry organizer',
            'name_ar' => 'موظف لتنظيم الدخول ليوم واحد',
            'price' => '100',
            'type' => 'withoutValue',
        ]);

        PackageFeature::create([
            'package_id' => 1,
            'feature_id' => $feature->id,
        ]);
        PackageFeature::create([
            'package_id' => 2,
            'feature_id' => $feature->id,
        ]);
        PackageFeature::create([
            'package_id' => 3,
            'feature_id' => $feature->id,
        ]);
    }
}
