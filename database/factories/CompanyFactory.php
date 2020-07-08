<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'industry' =>$faker->company,
        'ceo'=>$faker->name(2),
        'twitter'=>$faker->unique()->firstName
    ];
});
