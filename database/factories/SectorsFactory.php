<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sectors;
use Faker\Generator as Faker;

$factory->define(Sectors::class, function (Faker $faker) {
    return [
        //
        'name' =>$faker->name(2),
    ];
});
