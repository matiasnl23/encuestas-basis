<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SurveyAdministration;
use Faker\Generator as Faker;

$factory->define(SurveyAdministration::class, function (Faker $faker) {
    $inconveniente = $faker->numberBetween(1, 3);

    return [
        'atencion_telefonica' => $faker->numberBetween(1, 5),
        'inconveniente' => $faker->numberBetween(1, 3),
        'solucionado' => $inconveniente !== 1 ? $faker->numberBetween(1, 3): null,
    ];
});
