<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    $positions = [
        'HR-менеджер',
        'Бухгалтер',
        'Начальник отдела',
        'Помощник',
    ];

    return [
        'phone' => $faker->phoneNumber,
        'position' => $faker->randomElement($positions),
    ];
});
