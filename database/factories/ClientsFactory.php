<?php

use Faker\Generator as Faker;

$factory->define(App\Models\MainPageClient::class, function (Faker $faker) {
    return [
        'logo' => '/img/logotype_14.png',
        'name' => $faker->text(25),
        'link' => $faker->url,
    ];
});
