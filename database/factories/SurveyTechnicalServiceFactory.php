<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SurveyTechnicalService;
use Faker\Generator as Faker;

$factory->define(SurveyTechnicalService::class, function (Faker $faker) {
    $capacitacion = $faker->numberBetween(0,5);
    $montaje = $faker->numberBetween(0,5);

    return [
        'ingenieria' => $faker->numberBetween(1, 5),
        'puesta_servicio' => $faker->numberBetween(1, 5),
        'capacitacion' => $capacitacion === 0 ? null : $capacitacion,
        'montaje' => $montaje === 0 ? null : $montaje,
    ];
});
