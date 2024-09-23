<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feature =  Feature::create([
            'name' => 'One-day entry organizer',
            'name_ar' => 'موظف لتنظيم الدخول ليوم واحد',
            'price' => '100',
            'type' => 'withoutValue',
        ]);

        DB::table('package_features')->insert([
            ['package_id' => 1, 'feature_id' => $feature->id],
            ['package_id' => 2, 'feature_id' => $feature->id],
            ['package_id' => 3, 'feature_id' => $feature->id],
        ]);
    }
}
