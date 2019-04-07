<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaLibros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('isb');
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('autor');
            $table->string('editorial');
            $table->integer('anio');
            $table->string('genero');
            $table->string('idioma');
            $table->string('seccion');
            $table->integer('ejemplar');
            $table->integer('diasMaxPrestamo');
            $table->string('linkImagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
