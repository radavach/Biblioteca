<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaBibliotecas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliotecas', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->softDeletes();

            $table->increments('id');
            $table->string('nombre');
            $table->time('horaApertura');
            $table->time('horaCierre');
            $table->date('dias')->nullable();
            $table->string('telefono')->nullable();
            $table->string('paginaWeb')->nullable();
            $table->string('facebook')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('bibliotecas');
    }
}
