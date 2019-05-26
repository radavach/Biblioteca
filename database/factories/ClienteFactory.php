<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->firstName,
        'apellidoPaterno' => $faker->lastName,
        'apellidoMaterno' => $faker->lastName,
        'nombreUsuario' => $faker->userName,
        'telefono' => $faker->randomNumber(8),
        'direccion' => $faker->address,
        'email' => $faker->unique()->safeEmail,
    ];
});
