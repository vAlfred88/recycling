<?php

use Faker\Generator as Faker;

$factory->define(App\Place::class, function (Faker $faker) {
    return [
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'city' => $faker->randomElement([
            'Москва',
            'Санкт-Петербург',
            'Екатеринбург',
            'Петропавловск-Камчатский',
            'Красноярск',
        ]),
        'address' => $faker->address,
        'place_id' => str_random(10),
    ];
});
