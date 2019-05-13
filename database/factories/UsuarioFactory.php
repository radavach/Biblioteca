<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {

    $nombre = $faker->firstName;
    $apellidoPat = $faker->lastName;
    $apellidoMat = $faker->lastName;
    $esAdmin = false;

    return [
        //
        'nombre' => $nombre,
        'apellidoPaterno' => $apellidoPat,
        'apellidoMaterno' => $apellidoMat,
        'nombreUsuario' => $faker->userName,
        'direccion' => $faker->address,
        'biblioteca_id' => '1',
        'esAdmin' => $esAdmin,

        'name' => $nombre . ' ' . $apellidoPat . ' ' . $apellidoMat,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        // 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
