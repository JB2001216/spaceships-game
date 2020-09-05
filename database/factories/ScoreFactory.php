<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Score;
use Faker\Generator as Faker;

$factory->define(Score::class, function (Faker $faker) {
    return [
        'won' => $faker->numberBetween(0, 10),
        'lost' => $faker->numberBetween(0, 10)
    ];
});
