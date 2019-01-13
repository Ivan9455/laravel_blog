<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'id_user' => $faker->id_user,
        'id_author' => $faker->id_author,
        'id_post_info' => $faker->id_post_info
    ];
});
