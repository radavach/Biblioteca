<?php

use Faker\Generator as Faker;
use App\Biblioteca;

$factory->define(App\Persona::class, function (Faker $faker) {

    $biblioteca = Biblioteca::first();

    return [
        //
        'nombre' => $faker->firstName,
        'apellidoPaterno' => $faker->lastName,
        'apellidoMaterno' => $faker->lastName,
        'nombreUsuario' => $faker->userName,
        'direccion' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'biblioteca_id' => $biblioteca->id,
    ];
});
