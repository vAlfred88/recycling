<?php

use Faker\Generator as Faker;

$factory->define(App\Reception::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'company_id' => function () {
            return factory('App\Company')->create();
        }
    ];
});
