<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        //
        'snumber' => $faker->snumber,
        'service' => $faker->service,
        'companyname' => $faker->companyname,
        'cost' => $faker->cost,
        'duration' => $faker->duration,
    ];
});
