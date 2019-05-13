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
            $table->softDeletes();

            $table->increments('id');
            $table->string('isbn');
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->string('autor');
            $table->string('editorial');
            $table->integer('anio');
            $table->string('genero')->nullable();
            $table->string('idioma');
            $table->string('seccion')->nullable();
            $table->integer('ejemplar')->nullable();
            $table->integer('diasMaxPrestamo');
            $table->string('linkImagen')->nullable();
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
