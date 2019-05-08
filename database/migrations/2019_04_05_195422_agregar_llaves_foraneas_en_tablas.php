<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarLlavesForaneasEnTablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('users', function(Blueprint $table) {
            $table->string('nombre');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('nombreUsuario');
            $table->string('telefono')->nullable();
            $table->string('direccion');

            $table->unsignedInteger('biblioteca_id');
            $table->foreign('biblioteca_id')
                ->references('id')
                ->on('bibliotecas')
                ->onDelete('cascade');
        });

        Schema::table('libros', function(Blueprint $table){
            $table->unsignedInteger('biblioteca_id');
            $table->foreign('biblioteca_id')
                ->references('id')
                ->on('bibliotecas')
                ->onDelete('cascade');
        });
        
        Schema::table('empleados', function(Blueprint $table){
            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')
            ->references('id')
            ->on('personas')
            ->onDelete('cascade');
        });
        
        Schema::table('prestamos', function(Blueprint $table){
            $table->unsignedInteger('ejemplar_id');
            $table->foreign('ejemplar_id')
                ->references('id')
                ->on('ejemplares')
                ->onDelete('cascade');        

            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');
        });
        
        Schema::table('materiales', function(Blueprint $table){
            $table->UnsignedInteger('biblioteca_id');
            $table->foreign('biblioteca_id')
                ->references('id')
                ->on('bibliotecas')
                ->onDelete('cascade');
        });

        Schema::table('ejemplares', function(Blueprint $table){
            $table->integer('isbLibro');
            
            $table->unsignedInteger('libro_id');
            $table->foreign('libro_id')
                ->references('id')
                ->on('libros')
                ->onDelete('cascade');
        });

        Schema::table('clientes', function(Blueprint $table){
            $table->unsignedInteger('persona_id');
            $table->foreign('persona_id')
                ->references('id')
                ->on('personas')
                ->onDelete('cascade');
        });

        Schema::table('personas', function(Blueprint $table){
            $table->unsignedInteger('biblioteca_id');
            $table->foreign('biblioteca_id')
                ->references('id')
                ->on('bibliotecas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('empleados', function(Blueprint $table){
            $table->dropColumn('persona_id');
        });
        Schema::table('libros', function(Blueprint $table){
            $table->dropColumn('biblioteca_id');
        });
        Schema::table('materiales', function(Blueprint $table){
            $table->dropColumn('biblioteca_id');
        });
        Schema::table('prestamos', function(Blueprint $table){
            $table->dropColumn('ejemplar_id');
            $table->dropColumn('cliente_id');
        });
        Schema::table('ejemplares', function(Blueprint $table){
            $table->dropColumn('isbLibro');
            $table->dropColumn('libro_id');
        });
        Schema::table('clientes', function(Blueprint $table){
            $table->dropColumn('persona_id');
        });
        Schema::table('personas', function(Blueprint $table){
            $table->dropColumn('biblioteca_id');
        });
    }
}
