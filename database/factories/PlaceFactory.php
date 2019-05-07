<?php

use Faker\Generator as Faker;

$factory->define(App\Place::class, function (Faker $faker) {
    return [
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'city' => $faker->city,
        'address' => $faker->address,
        'place_id' => str_random(10),
    ];
});
