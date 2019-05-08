<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(BibliotecaSeeder::class);
        // $this->call(UsuarioSeeder::class);
        $this->call(PersonaSeeder::class);
    }
}
