<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SurveyQuality;
use Faker\Generator as Faker;

$factory->define(SurveyQuality::class, function (Faker $faker) {
    return [
        'conformidad' => $faker->numberBetween(1, 5),
        'recomendacion' => $faker->numberBetween(1, 5),
        'iso_existencia' => $faker->numberBetween(1, 3),
        'iso_utilidad' => $faker->numberBetween(1, 3),
        'comentario' => $faker->realText($faker->numberBetween(10, 20)),
    ];
});
