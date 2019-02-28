<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'address' => $faker->address,
        'latitude' => $faker->latitude(),
        'longitude' => $faker->longitude(),
    ];
});
