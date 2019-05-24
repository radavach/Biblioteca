<?php

use Illuminate\Database\Seeder;
use App\Biblioteca;

class BibliotecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = new DateTime('2019-10-01');
        Biblioteca::create([
            'nombre' => 'Juan José Arreola',
            'horaApertura' => date("H:i:s", mktime(8,00)),
            'horaCierre' => date("H:i:s", mktime(19,00)),
            'dias' => $fecha,
            'telefono' => '36972137',
            'paginaWeb' => 'paginaBiblioteca1.com',
            'facebook' => 'paginaBiblioteca1',
            'email' => 'paginaBiblioteca1@gmail.com',
        ]);
        Biblioteca::create([
            'nombre' => 'Mario Castañeda',
            'horaApertura' => date("H:i:s", mktime(8,00)),
            'horaCierre' => date("H:i:s", mktime(19,00)),
            'dias' => $fecha,
            'telefono' => '12345678',
            'paginaWeb' => 'paginaBiblioteca2.com',
            'facebook' => 'paginaBiblioteca2',
            'email' => 'paginaBiblioteca2@gmail.com',
        ]);
    }
}
