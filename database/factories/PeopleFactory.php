<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\People;
use Faker\Generator as Faker;

$factory->define(People::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'position' => $faker->default('servant'),
        'company_id' =>$faker->random_int,
        'twitter_handle' =>$faker->unique()->name,
        'facebook_handle' =>$faker->unique()->name,
        'linkedin' =>$faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
    ];
});
