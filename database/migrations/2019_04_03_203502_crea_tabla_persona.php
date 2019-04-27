<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('nombreUsuario');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('email');
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
        Schema::dropIfExists('personas');
    }
}
