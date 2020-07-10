<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\People;
use Faker\Generator as Faker;

$factory->define(People::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'position' => ucfirst($faker->word(20)),
        'company_id' => factory(App\Company::class),
        'twitter' => $faker->unique()->name,
        'facebook' => $faker->unique()->name,
        'linkedin' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
    ];
});
