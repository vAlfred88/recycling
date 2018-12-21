<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'label' => $name
    ];
});
