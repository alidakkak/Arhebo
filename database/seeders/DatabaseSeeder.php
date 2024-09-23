<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdditionalPackage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(AboutAppSeeder::class);
        $this->call(FrequentlyAskedQuestionSeeder::class);
        $this->call(OfferSeeder::class);
        $this->call(PrivacyPolicySeeder::class);
        $this->call(ProhibitedThingSeeder::class);
        $this->call(TermSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(PackageDetailsSeeder::class);
        $this->call(FilterSeeder::class);
        //        $this->call(TemplateSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(InputSeeder::class);
        $this->call(TemplateJawadSeeder::class);
        $this->call(TestInvitationSeeder::class);
        $this->call(NicknameSeeder::class);
        $this->call(AdditionalPackage::class);
    }
}
