<?php

use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Libro::class)->create(['titulo'=> 'La sirenita', 'autor'=> 'Mexicanos Unidos']);
        factory(App\Libro::class)->create([

            'isbn'=>'1234567891023',
            'titulo'=>'El fantasma de Canterville',
            'autor'=>'Oscar Wilde',
            'editorial'=>'Mexicanos Unidos',
            'anio' =>'2002',
            'idioma'=>'español',
            'diasMaxPrestamo'=> '10'

        ]);
        factory(App\Libro::class)->create(['titulo'=> 'El retrato de Dorian Gray','autor'=> 'Mexicanos Unidos']);
        factory(App\Libro::class)->create(['titulo'=> 'Las Batallas en el desierto', 'autor'=> 'Mexicanos Unidos']);
        factory(App\Libro::class)->create(['titulo'=> 'El Principito', 'autor'=> 'Mexicanos Unidos']);
        factory(App\Libro::class)->create(['titulo'=> 'Sherlock Holmes', 'autor'=> 'Anonimo']);
        factory(App\Libro::class)->create(['titulo'=> 'El niño con el pijama de rayas', 'autor'=> 'Anonimo']);
        factory(App\Libro::class)->create(['titulo'=> 'Salomé', 'autor'=> 'Oscar Wilde']);
        factory(App\Libro::class)->create(['titulo'=> '1984', 'autor'=> 'Anonimo']);
        factory(App\Libro::class)->create(['titulo'=> 'Un mundo Feliz']);
        factory(App\Libro::class)->create(['titulo'=> 'Paco el Chato']);
        
        factory(App\Libro::class)->create(['titulo'=> 'El retrato de Dorian Gray','autor'=> 'Mexicanos Unidos', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'Las Batallas en el desierto', 'autor'=> 'Mexicanos Unidos', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'El Principito', 'autor'=> 'Mexicanos Unidos', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'Sherlock Holmes', 'autor'=> 'Anonimo', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'El niño con el pijama de rayas', 'autor'=> 'Anonimo', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'Salomé', 'autor'=> 'Oscar Wilde', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> '1984', 'autor'=> 'Anonimo', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'Un mundo Feliz', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'Paco el Chato', 'biblioteca_id' => '2']);

    }
}
