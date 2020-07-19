<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    $dt = $faker->dateTimeBetween('-4 years', 'now');
    $codes = [
                '0116','0119','0123','0124','0155','0156','0164',
                '0215','0220','0222','0227','0228','0229','0230',
                '0231','0232','0233','0234','0252','0326','0437',
                '0451','0513','0514','0517','0521','0535','0544'
            ];

    return [
        'payment_no' => $faker->randomNumber(5, true).$faker->randomNumber(5, true)."-".$faker->randomNumber(2, true),
        'payment_code' => $faker->randomElement($codes).$faker->randomNumber(6, true),
        'organization' => $faker->company,
        'beneficiary' => $faker->company,
        'amount' => $faker->numberBetween(1000000,1000000000),
        'payment_date' =>  $dt->format('Y-m-d'),
        'description' => $faker->paragraph(1)
    ];
    
});
