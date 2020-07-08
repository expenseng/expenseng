<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
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
