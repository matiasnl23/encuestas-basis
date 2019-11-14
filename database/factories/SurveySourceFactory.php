<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SurveySource;
use Faker\Generator as Faker;

$factory->define(SurveySource::class, function (Faker $faker) {
    return [
        'source_uuid' => $faker->unique()->uuid,
        'source_hash' => $faker->sha256,
        'client_id' => $faker->numberBetween(1, 286),
        'is_maintenance' => $faker->boolean(),
    ];
});
