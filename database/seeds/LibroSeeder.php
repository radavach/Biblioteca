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
        factory(App\Libro::class)->create(['titulo'=> 'La sirenita', 'autor'=> 'Mexicanos Unidos', 'linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);
        factory(App\Libro::class)->create([

            'isbn'=>'1234567891023',
            'titulo'=>'El fantasma de Canterville',
            'autor'=>'Oscar Wilde',
            'editorial'=>'Mexicanos Unidos',
            'anio' =>'2002',
            'idioma'=>'español',
            'diasMaxPrestamo'=> '10',
            'linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 
            'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg'
            

        ]);
        factory(App\Libro::class)->create(['titulo'=> 'El retrato de Dorian Gray','autor'=> 'Mexicanos Unidos', 'linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'Las Batallas en el desierto', 'autor'=> 'Mexicanos Unidos', 'linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'El Principito', 'autor'=> 'Mexicanos Unidos', 'linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'Sherlock Holmes', 'autor'=> 'Anonimo', 'linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'El niño con el pijama de rayas', 'autor'=> 'Anonimo', 'linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'Salomé', 'autor'=> 'Oscar Wilde', 'linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);
        factory(App\Libro::class)->create(['titulo'=> '1984', 'autor'=> 'Anonimo', 'linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'Un mundo Feliz','linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'Paco el Chato','linkImagen'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);

    }
}
