<?php

namespace Database\Seeders;

use App\Models\ProhibitedThing;
use Illuminate\Database\Seeder;

class ProhibitedThingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ProhibitedThing::create([
            'name' => 'Children are not allowed',
            'name_ar' => 'ممنوع اصطحاب الأطفال',
        ]);

        ProhibitedThing::create([
            'name' => 'Mobile photography is not allowed',
            'name_ar' => 'ممنوع التصوير',
        ]);

        ProhibitedThing::create([
            'name' => 'The invitation is personal.',
            'name_ar' => 'الدعوة شخصية',
        ]);
    }
}
