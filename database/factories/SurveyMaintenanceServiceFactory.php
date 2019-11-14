<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SurveyMaintenanceService;
use Faker\Generator as Faker;

$factory->define(SurveyMaintenanceService::class, function (Faker $faker) {
    return [
        'horarios_fechas' => $faker->numberBetween(1, 3),
        'tecnico_capacidad' => $faker->numberBetween(1, 3),
        'programa_mantenimiento' => $faker->numberBetween(1, 3),
        'velocidad_respuesta' => $faker->numberBetween(1, 5),
        'general' => $faker->numberBetween(1, 5),
    ];
});
