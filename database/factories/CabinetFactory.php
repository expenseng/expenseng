<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cabinet;
use Faker\Generator as Faker;

$factory->define(Cabinet::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'twitter_handle' => $faker->unique()->name,
        'role' => $faker->lastName,
        'ministry_code' => $faker->randomNumber(5),
    ];
});
