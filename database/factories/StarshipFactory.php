<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Starship;
use Faker\Generator as Faker;

$factory->define(Starship::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'crew' => $faker->numberBetween(50, 2000)
    ];
});
