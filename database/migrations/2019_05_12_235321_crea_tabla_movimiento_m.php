<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaMovimientoM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientoM', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->softDeletes();

            $table->increments('id');
            $table->integer('idPrestamo')->nullable();
            $table->string('idArticulo')->nullable();
            $table->integer('numEjemplar')->nullable();
            $table->dateTime('fechaPrestamo');
            $table->string('nombreUsuario')->nullable();
            $table->string('rfcCliente')->nullable();
            $table->boolean('devuelto');
            $table->dateTime('fechaDevolucion')->nullable();
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
        Schema::dropIfExists('movimientoM');
    }
}
