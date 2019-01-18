<?php

use Faker\Generator as Faker;

$factory->define(\Spatie\Permission\Models\Permission::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'guard_name' => 'web',
    ];
});
