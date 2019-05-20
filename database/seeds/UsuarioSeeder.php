<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 10)->create();
        factory(App\User::class)->create([
            'email' => 'danielophj@hotmail.com',
            'esAdmin' => TRUE
        ]);
    }
}
