<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'phone' => $faker->phoneNumber,
        'description' => $faker->paragraph,
        'site' => $faker->url,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
    ];
});
