<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    $faker->locale = 'ru_RU';
    return [
        'title' => $faker->text(50),
        'description' => $faker->text(100),
        'img' => '/img/thumb_5_img_04.jpg',
        'body' => $faker->text,
        'category_id' => rand(1, 5),
    ];
});
