<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recordatori;
use Faker\Generator as Faker;

$factory->define(Recordatori::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'hora'=>$faker->date("Y-m-d H:i:s"),
        'home_id'=>$faker->randomdigit(),
    ];
});
