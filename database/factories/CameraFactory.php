<?php

use Faker\Generator as Faker;

$factory->define(App\Camera::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
