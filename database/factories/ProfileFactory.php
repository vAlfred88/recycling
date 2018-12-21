<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'position' => $faker->word,
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        }
    ];
});
