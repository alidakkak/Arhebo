<?php

namespace Database\Seeders;

use App\Models\PackageDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'price_qr' => '160',
            'number_of_invitees' => '25',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '255',
            'price_qr' => '300',
            'number_of_invitees' => '50',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '455',
            'price_qr' => '500',
            'number_of_invitees' => '100',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '685',
            'price_qr' => '720',
            'number_of_invitees' => '150',
        ]);

        PackageDetail::create([
            'package_id' => '1',
            'price' => '895',
            'price_qr' => '930',
            'number_of_invitees' => '200',
        ]);


        PackageDetail::create([
            'package_id' => '1',
            'price' => '1125',
            'price_qr' => '1200',
            'number_of_invitees' => '250',
        ]);


        PackageDetail::create([
            'package_id' => '1',
            'price' => '1345',
            'price_qr' => '1450',
            'number_of_invitees' => '300',
        ]);


        PackageDetail::create([
            'package_id' => '1',
            'price' => '1695',
            'price_qr' => '1800',
            'number_of_invitees' => '400',
        ]);


        PackageDetail::create([
            'package_id' => '1',
            'price' => '1985',
            'price_qr' => '2200',
            'number_of_invitees' => '500',
        ]);


        PackageDetail::create([
            'package_id' => '2',
            'price' => '195',
            'price_qr' => '245',
            'number_of_invitees' => '25',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '695',
            'price_qr' => '750',
            'number_of_invitees' => '50',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '1295',
            'price_qr' => '1400',
            'number_of_invitees' => '100',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '1885',
            'price_qr' => '1995',
            'number_of_invitees' => '150',
        ]);

        PackageDetail::create([
            'package_id' => '3',
            'price' => '2395',
            'price_qr' => '2485',
            'number_of_invitees' => '200',
        ]);


        PackageDetail::create([
            'package_id' => '3',
            'price' => '2985',
            'price_qr' => '3045',
            'number_of_invitees' => '250',
        ]);


        PackageDetail::create([
            'package_id' => '3',
            'price' => '3595',
            'price_qr' => '3785',
            'number_of_invitees' => '300',
        ]);


        PackageDetail::create([
            'package_id' => '3',
            'price' => '4585',
            'price_qr' => '4865',
            'number_of_invitees' => '400',
        ]);


        PackageDetail::create([
            'package_id' => '3',
            'price' => '5595',
            'price_qr' => '5835',
            'number_of_invitees' => '500',
        ]);

        PackageDetail::create([
            'package_id' => '4',
            'price' => '2595',
            'price_qr' => '3865',
            'number_of_invitees' => '100',
        ]);

        PackageDetail::create([
            'package_id' => '4',
            'price' => '3285',
            'price_qr' => '3445',
            'number_of_invitees' => '150',
        ]);

        PackageDetail::create([
            'package_id' => '4',
            'price' => '3895',
            'price_qr' => '4065',
            'number_of_invitees' => '200',
        ]);


        PackageDetail::create([
            'package_id' => '4',
            'price' => '4585',
            'price_qr' => '4665',
            'number_of_invitees' => '250',
        ]);


        PackageDetail::create([
            'package_id' => '4',
            'price' => '5395',
            'price_qr' => '5445',
            'number_of_invitees' => '300',
        ]);


        PackageDetail::create([
            'package_id' => '4',
            'price' => '7185',
            'price_qr' => '7445',
            'number_of_invitees' => '400',
        ]);


        PackageDetail::create([
            'package_id' => '4',
            'price' => '8495',
            'price_qr' => '8555',
            'number_of_invitees' => '500',
        ]);
    }
}
