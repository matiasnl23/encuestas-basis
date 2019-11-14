<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\surveyInformation;
use Faker\Generator as Faker;

$factory->define(surveyInformation::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company' => $faker->company,
        'email' => $faker->companyEmail
    ];
});
