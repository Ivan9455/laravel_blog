<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'content' => $faker->content,
        'id_user' => $faker->id_user
    ];
});
