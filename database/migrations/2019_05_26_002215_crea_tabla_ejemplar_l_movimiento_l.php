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
        Schema::create('ejemplar_l_movimiento_l', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->softDeletes();

            $table->increments('id');
            $table->date('fechaPrestamo');
            $table->date('fechaDevolucion')->nullable();
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
