<?php

use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Material::class)->create([
            'biblioteca_id'=>'2',
            'nombre'=>'Monopoly Gamer',
            'seccion'=>'M113',
            'ejemplar'=>'01'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'1',
            'nombre'=>'Monopoly Gamer',
            'seccion'=>'M113',
            'ejemplar'=>'02'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'2',
            'nombre'=>'Periodico el Informador',
            'seccion'=>'M114',
            'ejemplar'=>'01'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'1',
            'nombre'=>'Periodico el Informador',
            'seccion'=>'M114',
            'ejemplar'=>'02'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'1',
            'nombre'=>'Batalla Naval',
            'seccion'=>'M113',
            'ejemplar'=>'01'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'2',
            'nombre'=>'Batalla Naval',
            'seccion'=>'M113',
            'ejemplar'=>'02'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'1',
            'nombre'=>'shogi',
            'seccion'=>'M113',
            'ejemplar'=>'01'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'2',
            'nombre'=>'shogi',
            'seccion'=>'M113',
            'ejemplar'=>'02'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'2',
            'nombre'=>'Ruleta Rusa',
            'seccion'=>'M213',
            'ejemplar'=>'01'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'1',
            'nombre'=>'Ruleta Rusa',
            'seccion'=>'M213',
            'ejemplar'=>'02'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'2',
            'nombre'=>'Turista Mundial',
            'seccion'=>'M113',
            'ejemplar'=>'01'
        ]);
        factory(App\Material::class)->create([
            'biblioteca_id'=>'1',
            'nombre'=>'Turista Mundial',
            'seccion'=>'M113',
            'ejemplar'=>'02'
        ]);
    }
}
