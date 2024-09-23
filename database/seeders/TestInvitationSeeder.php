<?php

namespace Database\Seeders;

use App\Models\Invitation;
use App\Models\Invitee;
use Illuminate\Database\Seeder;

class TestInvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invitation::$isSeederRunning = true;

        Invitation::create([
            'category_id' => '1',
            'package_id' => '1',
            'image' => 'https://api.dev1.gomaplus.tech/test_invitation/test.png',
            'package_detail_id' => '1',
            'user_id' => '1',
            'hijri_date' => '1446-08-01',
            'miladi_date' => '2024-01-26',
            'from' => '8:30',
            'to' => '10:30',
            'city' => 'سعودية',
            'region' => 'جدة',
            'event_name' => 'حفل زفاف سالم أحمد وليان محمد',
            'location_link' => 'https://www.google.com/maps/place/Jeddah+Saudi+Arabia/@21.4501099,38.5516522,9z/data=!3m1!4b1!4m6!3m5!1s0x15c3d01fb1137e59:0xe059579737b118db!8m2!3d21.5291545!4d39.1610863!16zL20vMDFwazhi?entry=ttu&g_ep=EgoyMDI0MDkxOC4xIKXMDSoASAFQAw%3D%3D',
            'inviter' => 'عبدالرحمن سعد',
            'number_of_invitees' => '25',
        ]);

        Invitee::create([
            'invitation_id' => '1',
            'name' => 'جواد',
            'phone' => '963937356470',
            'uuid' => 'test_invitation',
            'link' => 'invitation-card/1?uuid=test_invitation',
            'number_of_people' => '3',
        ]);
    }
}
