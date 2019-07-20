<?php

use Faker\Generator as Faker;

$factory->define(App\Money::class, function (Faker $faker) {
    $numbers = [
        '348104859345',
        '348104823137',
        '348104867857',
        '348104876857',
        '348104823457',
        '348104429357',
        '348104239357',
        '681123859357',
    ];
    return [
        'money' => '' . $faker->numberBetween(1, 1000) * 1000,
//        'creditCardNumber' => $numbers [random_int(0, 7)] . random_int(1111, 9999),
    ];
});