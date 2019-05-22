<?php

use Faker\Generator as Faker;

$factory->define(App\Material::class, function (Faker $faker) {
    return [
        //
        'idArticulo'=>$faker->randomDigitNotNull,
        'autor'=>$faker->firstName,


    ];
});
