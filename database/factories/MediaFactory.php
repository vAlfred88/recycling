<?php

use Faker\Generator as Faker;

$factory->define(\App\Media::class, function (Faker $faker) {
    return [
        'path' => $faker->image('storage/companies')
    ];
});
