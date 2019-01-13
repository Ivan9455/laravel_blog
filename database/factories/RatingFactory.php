<?php

use Faker\Generator as Faker;

$factory->define(App\Rating::class, function (Faker $faker) {
    return [
        'id_user' => $faker->id_user,
        'id_post' => $faker->id_post,
        'status'  => $faker->status,
        'created_at' => now()
    ];
});
