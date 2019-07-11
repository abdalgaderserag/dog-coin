<?php

use Faker\Generator as Faker;

$factory->define(App\Money::class, function (Faker $faker) {
    return [
        'money' => $faker->numberBetween(1,1000) * 1000 . '.20',
        'creditCardNumber' => $faker->creditCardNumber,
    ];
});
