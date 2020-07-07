<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ministries;
use Faker\Generator as Faker;

$factory->define(Ministries::class, function (Faker $faker) {
    return [
        //
        'code' =>$faker->randomNumber(3),
        'name' => $faker->name,
        'shortname' =>$faker->lastName,
        'twitter_handle' =>$faker->unique()->lastName,
        'website' => $faker->url,
        'sector_id' => $faker->rand,
    ];
});
