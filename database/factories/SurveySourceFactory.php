<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SurveySource;
use Faker\Generator as Faker;

$factory->define(SurveySource::class, function (Faker $faker) {
    return [
        'source_token' => $faker->unique()->uuid
    ];
});
