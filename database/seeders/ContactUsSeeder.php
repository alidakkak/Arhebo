<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactUs::create([
            'phone' => '+966565105757',
            'email' => 'Support@ar7ebo.com',
            'facebook' => 'https://www.facebook.com/share/PFaMebrKnsDbjaA9/?mibextid=LQQJ4d',
            'instagram' => 'https://www.instagram.com/ar7eboksa?igsh=MTYzanZqNWVkYW9zNA%3D%3D&utm_source=qr',
            'whatsapp' => '+966565105757',
            'x' => '',
        ]);
    }
}
