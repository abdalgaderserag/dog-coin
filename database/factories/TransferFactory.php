<?php

use Faker\Generator as Faker;

$factory->define(App\Transfer::class, function (Faker $faker) {
    return [
        'amount' => random_int(1,23) * 100,
    ];
});
