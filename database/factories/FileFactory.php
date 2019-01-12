<?php

use Faker\Generator as Faker;

$factory->define(App\Media::class, function (Faker $faker) {
    return [
        'path' => $faker->imageUrl(127, 127),
        'name' => $faker->word,
    ];
});
