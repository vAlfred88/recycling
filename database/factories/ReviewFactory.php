<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'label' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});
