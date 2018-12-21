<?php

use Faker\Generator as Faker;

$factory->define(App\Permission::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'label' => $name
    ];
});
