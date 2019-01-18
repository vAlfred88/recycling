<?php

use Faker\Generator as Faker;

$factory->define(App\Reception::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'open' => $faker->time(),
        'close' => $faker->time(),
        'company_id' => function () {
            return factory('App\Company')->create();
        }
    ];
});
