<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ArticleCategory::class, function (Faker $faker) {
    $faker->locale = 'ru_RU';
    return [
        'title' => $faker->userName
    ];
});
