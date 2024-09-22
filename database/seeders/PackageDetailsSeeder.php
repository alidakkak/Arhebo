<?php

namespace Database\Seeders;

use App\Models\PackageDetail;
use Illuminate\Database\Seeder;

class PackageDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackageDetail::create([
            'package_id' => '1',
            'price' => '135',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '25',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '255',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '50',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '455',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '100',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '685',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '150',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '895',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '200',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '1125',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '250',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '1345',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '300',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '1695',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '400',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '1985',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '500',
        ]);

        PackageDetail::create([
            'package_id' => '2',
            'price' => '195',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '25',
        ]);

        PackageDetail::create([
            'package_id' => '2',
            'price' => '335',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '50',
        ]);

        PackageDetail::create([
            'package_id' => '2',
            'price' => '625',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '100',
        ]);

        PackageDetail::create([
            'package_id' => '2',
            'price' => '895',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '150',
        ]);

        PackageDetail::create([
            'package_id' => '2',
            'price' => '1185',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '200',
        ]);

        PackageDetail::create([
            'package_id' => '2',
            'price' => '1495',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '250',
        ]);

        PackageDetail::create([
            'package_id' => '2',
            'price' => '1785',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '300',
        ]);

        PackageDetail::create([
            'package_id' => '2',
            'price' => '2295',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '400',
        ]);

        PackageDetail::create([
            'package_id' => '2',
            'price' => '2785',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '500',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '695',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '50',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '1295',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '100',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '1885',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '150',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '2395',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '200',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '2985',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '250',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '3595',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '300',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '4585',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '400',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '5595',
            'price_reminder_per_person' => '1',
            'number_of_invitees' => '500',
        ]);
    }
}
