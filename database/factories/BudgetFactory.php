<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Budget;
use Faker\Generator as Faker;

$factory->define(Budget::class, function (Faker $faker) {
    return [
        //
        'amount' =>$faker->money_format->randomNumber(5),
        'project_name' =>$faker->name(2),
        'code' =>$faker->random_int,
        'year' =>$faker->year(),
        'classification' => $faker->firstName
    ];
});
