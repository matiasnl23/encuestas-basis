<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SurveyCustomerService;
use Faker\Generator as Faker;

$factory->define(SurveyCustomerService::class, function (Faker $faker) {
    return [
        'atencion_preventa' => $faker->numberBetween(1,5),
        'oferta_calidad' => $faker->numberBetween(1,5),
        'oferta_plazo' => $faker->numberBetween(1,5),
        'entrega_plazo' => $faker->numberBetween(1,5),
        'precios' => $faker->numberBetween(1,5),
    ];
});
