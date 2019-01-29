<?php

use Faker\Generator as Faker;

$factory->define(\Spatie\Permission\Models\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'label' => $faker->word,
        'guard_name' => 'web',
    ];
});
