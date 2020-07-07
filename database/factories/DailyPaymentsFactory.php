<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Daily_payments;
use Faker\Generator as Faker;

$factory->define(Daily_payments::class, function (Faker $faker) {
    return [
        //
        'payment_no' =>$faker->randomNumber(300),
        'payer_code' =>$faker->randomDigit,
        'organization' =>$faker->lastName,
        'beneficiary' =>$faker->firstName,
        'amount' =>$faker->randomNumber(4),
        'payment_date' =>$faker->date_date_set,
        'description' =>$faker->paragraph,
    ];
});
