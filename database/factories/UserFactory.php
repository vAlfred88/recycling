<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'password',
        'remember_token' => str_random(10),
        'company_id' => function () {
            return factory(\App\Company::class)->create()->id;
        },
    ];
});
