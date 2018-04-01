<?php

use Faker\Generator as Faker;

$factory->define(App\Feedback::class, function (Faker $faker) {
    return [
        'email' => $faker->safeEmail,
        'feedback' => $faker->realText(200, 2),
        'score' => $faker->numberBetween(1,5),
        'platform' => $faker->randomElement(['android', 'iphone', 'desktop']),
        'appversion' => '0.0.1',
        'deviceversion' => '0.0.1',
    ];
});
