<?php

use Faker\Generator as Faker;

$factory->define(App\Libro::class, function (Faker $faker) {
    return [
        //
        'biblioteca_id'=>'1',
        'isbn'=> $faker->isbn13,
        'titulo'=>$faker->title,
        'autor'=>$faker->name,
        'editorial'=>$faker->firstName,
        'anio'=>$faker->year,
        'idioma'=>'español',
        'diasMaxPrestamo'=> '10',





    ];
});