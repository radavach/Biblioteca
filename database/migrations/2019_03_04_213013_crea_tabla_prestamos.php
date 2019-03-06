<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPrestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPrestamo');
            $table->integer('isbLibro');
            $table->integer('numEjemplar');
            $table->dateTime('fechaPrestamo');
            $table->string('nombreUsuario');
            $table->string('rfcCliente');
            $table->boolean('devuelto');
            $table->dateTime('fechaDevolucion');
            $table->double('comisionTotal');
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
        Schema::dropIfExists('prestamos');
    }
}
