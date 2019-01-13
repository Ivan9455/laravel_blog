<?php

use Faker\Generator as Faker;

$factory->define(App\Content::class, function (Faker $faker) {
    return [
        'text' => $faker->text,
        'created_at' => now()
    ];
});
