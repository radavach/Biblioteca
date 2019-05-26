<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaEjemplarLMovimientoL extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejemplarL_movimientoL', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->softDeletes();

            $table->increments('id');
            $table->dateTime('fechaPrestamo');
            $table->dateTime('fechaDevolucion')->nullable();
            $table->double('comision');
            $table->string('isbnLibro')->nullable();
            $table->integer('numEjemplar')->nullable();
            $table->boolean('devuelto');
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
        Schema::dropIfExists('ejemplarL_movimientoL');
    }
}
