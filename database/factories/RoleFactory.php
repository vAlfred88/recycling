<?php

use Faker\Generator as Faker;

$factory->define(\Spatie\Permission\Models\Role::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'guard_name' => 'web',
    ];
});
