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
        factory(App\Libro::class)->create(['titulo'=> 'La sirenita', 'autor'=> 'Mexicanos Unidos', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg']);
        factory(App\Libro::class)->create([

            'isbn'=>'1234567891023',
            'titulo'=>'El fantasma de Canterville',
            'autor'=>'Oscar Wilde',
            'editorial'=>'Mexicanos Unidos',
            'anio' =>'2002',
            'idioma'=>'español',
            'diasMaxPrestamo'=> '10',
            'link'=>'http://www.fundacioct.cat/wp-content/uploads/2017/12/fantasmaweb.jpg'

        ]);
        factory(App\Libro::class)->create(['titulo'=> 'El retrato de Dorian Gray','autor'=> 'Mexicanos Unidos', 'link'=>'https://www.neostuff.net/wp-content/uploads/2013/06/Dorian-Gray-001.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'Las Batallas en el desierto', 'autor'=> 'Mexicanos Unidos', 'link'=>'https://www.contrareplica.mx/uploads/normal/0755df869a8ed08ed86cdd67e973e86d.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'El Principito', 'autor'=> 'Mexicanos Unidos', 'link'=>'https://http2.mlstatic.com/cuento-personalizado-el-principito-y-yo-D_NQ_NP_622905-MLM26427486532_112017-F.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'Sherlock Holmes', 'autor'=> 'Anonimo', 'link'=>'https://fsmedia.imgix.net/19/bb/41/7f/67a2/451b/8d59/dbc23e442173/screen-shot-2017-11-21-at-125241-pmpng.png']);
        factory(App\Libro::class)->create(['titulo'=> 'El niño con el pijama de rayas', 'autor'=> 'Anonimo', 'link'=>'https://occ-0-987-990.1.nflxso.net/dnm/api/v6/0DW6CdE4gYtYx8iy3aj8gs9WtXE/AAAABcBAFM0MOSWJQ981keIP_9_QRIEivOJcJPbv1sUaqgpyiYPH8FpzhQVfcw0FZ_D5UWBuAHlC0sjfY1S-MdNYMMfHQaU5NJN7Kw.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'Salomé', 'autor'=> 'Oscar Wilde', 'link'=>'https://ep00.epimg.net/diario/imagenes/2011/06/04/babelia/1307146334_740215_0000000000_noticia_normal.jpg']);
        factory(App\Libro::class)->create(['titulo'=> '1984', 'autor'=> 'Anonimo', 'link'=>'https://image.isu.pub/170313140303-2476cfc42dfc21103704878daef7ff07/jpg/page_1_thumb_large.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'Un mundo Feliz', 'link'=>'https://rt00.epimg.net/retina/imagenes/2018/11/20/tendencias/1542718711_246803_1542718888_noticia_normal.jpg']);
        factory(App\Libro::class)->create(['titulo'=> 'Paco el Chato', 'link'=>'https://vanguardia.com.mx/sites/default/files/styles/paragraph_image_large_desktop_1x/public/esp-1-1-1_1.jpg']);

        factory(App\Libro::class)->create(['titulo'=> 'La sirenita', 'autor'=> 'Mexicanos Unidos', 'link'=>'http://static.t13.cl/images/sizes/1200x675/1416407550_1440sirenita.jpg', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create([

            'isbn'=>'1234567891023',
            'titulo'=>'El fantasma de Canterville',
            'autor'=>'Oscar Wilde',
            'editorial'=>'Mexicanos Unidos',
            'anio' =>'2002',
            'idioma'=>'español',
            'diasMaxPrestamo'=> '10',
            'link'=>'http://www.fundacioct.cat/wp-content/uploads/2017/12/fantasmaweb.jpg',
            'biblioteca_id' => '2'

        ]);
        factory(App\Libro::class)->create(['titulo'=> 'El retrato de Dorian Gray','autor'=> 'Mexicanos Unidos', 'link'=>'https://www.neostuff.net/wp-content/uploads/2013/06/Dorian-Gray-001.jpg', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'Las Batallas en el desierto', 'autor'=> 'Mexicanos Unidos', 'link'=>'https://www.contrareplica.mx/uploads/normal/0755df869a8ed08ed86cdd67e973e86d.jpg', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'El Principito', 'autor'=> 'Mexicanos Unidos', 'link'=>'https://http2.mlstatic.com/cuento-personalizado-el-principito-y-yo-D_NQ_NP_622905-MLM26427486532_112017-F.jpg', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'Sherlock Holmes', 'autor'=> 'Anonimo', 'link'=>'https://fsmedia.imgix.net/19/bb/41/7f/67a2/451b/8d59/dbc23e442173/screen-shot-2017-11-21-at-125241-pmpng.png', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'El niño con el pijama de rayas', 'autor'=> 'Anonimo', 'link'=>'https://occ-0-987-990.1.nflxso.net/dnm/api/v6/0DW6CdE4gYtYx8iy3aj8gs9WtXE/AAAABcBAFM0MOSWJQ981keIP_9_QRIEivOJcJPbv1sUaqgpyiYPH8FpzhQVfcw0FZ_D5UWBuAHlC0sjfY1S-MdNYMMfHQaU5NJN7Kw.jpg', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'Salomé', 'autor'=> 'Oscar Wilde', 'link'=>'https://ep00.epimg.net/diario/imagenes/2011/06/04/babelia/1307146334_740215_0000000000_noticia_normal.jpg', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> '1984', 'autor'=> 'Anonimo', 'link'=>'https://image.isu.pub/170313140303-2476cfc42dfc21103704878daef7ff07/jpg/page_1_thumb_large.jpg', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'Un mundo Feliz', 'link'=>'https://rt00.epimg.net/retina/imagenes/2018/11/20/tendencias/1542718711_246803_1542718888_noticia_normal.jpg', 'biblioteca_id' => '2']);
        factory(App\Libro::class)->create(['titulo'=> 'Paco el Chato', 'link'=>'https://vanguardia.com.mx/sites/default/files/styles/paragraph_image_large_desktop_1x/public/esp-1-1-1_1.jpg', 'biblioteca_id' => '2']);


    }
}
