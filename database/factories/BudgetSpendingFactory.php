<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Budget_spending;
use Faker\Generator as Faker;

$factory->define(Budget_spending::class, function (Faker $faker) {
    return [
        //
        'amount_spent' =>$faker->money_format->randomNumber(5),
        'year' =>$faker->year,
        'month' =>$faker->month,
        'body' =>$faker->text,

    ];
});
