<?php

namespace Database\Seeders;

use App\Models\Invitation;
use App\Models\Invitee;
<<<<<<< HEAD
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
>>>>>>> a5a9f5502020d7f839385627f28c0e4d99e971c5
use Illuminate\Database\Seeder;

class TestInvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invitation::create([
            'category_id' => '1',
            'package_id' => '1',
            'package_detail_id' => '1',
            'user_id' => '1',
            'hijri_date' => '1446-08-01',
            'miladi_date' => '2024-01-26',
            'from' => '8:30',
            'to' => '10:30',
            'city' => 'سعودية',
            'region' => 'جدة',
            'event_name' => 'زفاف',
            'location_link' => 'https://',
            'inviter' => 'عبدالرحمن سعد',
            'number_of_invitees' => '25',
        ]);

        Invitee::create([
            'invitation_id' => '1',
            'name' => 'جواد',
            'phone' => '963937356470',
            'uuid' => '859db51a-0580-46d6-bd59-3bd01453c15c',
            'link' => 'invitation-card/1?uuid=859db51a-0580-46d6-bd59-3bd01453c15c',
            'number_of_people' => '3',
        ]);
    }
}
