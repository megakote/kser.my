<?php

use Faker\Generator as Faker;

$factory->define(App\Models\News::class, function (Faker $faker) {
    return [
        'title' => $faker->text(40),
        'description' => $faker->text(100),
        'img' => '/img/thumb_5_img_04.jpg',
        'body' => $faker->text,
    ];
});
