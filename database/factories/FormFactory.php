<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Form::class, function (Faker $faker) {
    $faker->locale = 'ru_RU';
    return [
        'name' => $faker->name,
        'type' => rand(1, 6),
        'contact' => $faker->email,
        'comment' => $faker->text(50),
    ];
});
