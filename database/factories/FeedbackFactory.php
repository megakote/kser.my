<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Feedback::class, function (Faker $faker) {
    $faker->locale = 'ru_RU';
    return [
        'logo' => 'img/lagis.png',
        'name' => $faker->name,
        'city' => $faker->city,
        'body' => $faker->text,
    ];
});
