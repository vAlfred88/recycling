<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'review' => $faker->boolean,
        'body' => $faker->paragraph
    ];
});
