<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SurveyInformation;
use Faker\Generator as Faker;

$factory->define(SurveyInformation::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company' => $faker->company,
        'email' => $faker->companyEmail
    ];
});
