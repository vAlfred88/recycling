<?php

use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'label' => $faker->sentence,
        'url' => $faker->url
    ];
});
