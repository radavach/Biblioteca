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

        Schema::table('libros', function(Blueprint $table){
            $table->unsignedInteger('idBiblioteca');
            $table->foreign('idBiblioteca')
                ->references('id')
                ->on('bibliotecas')
                ->onDelete('cascade');
        });
        
        Schema::table('empleados', function(Blueprint $table){
            $table->integer('idPersona')->unsigned();
            $table->foreign('idPersona')
            ->references('id')
            ->on('personas')
            ->onDelete('cascade');
        });
        
        Schema::table('prestamos', function(Blueprint $table){
            $table->unsignedInteger('idEjemplar');
            $table->foreign('idEjemplar')
                ->references('id')
                ->on('ejemplares')
                ->onDelete('cascade');        

            $table->unsignedInteger('idCliente');
            $table->foreign('idCliente')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');
        });
        
        Schema::table('materiales', function(Blueprint $table){
            $table->UnsignedInteger('idBiblioteca');
            $table->foreign('idBiblioteca')
                ->references('id')
                ->on('bibliotecas')
                ->onDelete('cascade');
        });

        Schema::table('ejemplares', function(Blueprint $table){
            $table->unsignedInteger('idLibro');
            $table->integer('isbLibro');
            $table->foreign('idLibro')
                ->references('id')
                ->on('libros')
                ->onDelete('cascade');
        });

        Schema::table('clientes', function(Blueprint $table){
            $table->unsignedInteger('idPersona');
            $table->foreign('idPersona')
                ->references('id')
                ->on('personas')
                ->onDelete('cascade');
        });

        Schema::table('personas', function(Blueprint $table){
            $table->unsignedInteger('idBiblioteca');
            $table->foreign('idBiblioteca')
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
            $table->dropColumn('idPersona');
        });
        Schema::table('libros', function(Blueprint $table){
            $table->dropColumn('idBiblioteca');
        });
        Schema::table('materiales', function(Blueprint $table){
            $table->dropColumn('idBiblioteca');
        });
        Schema::table('prestamos', function(Blueprint $table){
            $table->dropColumn('idCliente');
        });
        Schema::table('ejemplares', function(Blueprint $table){
            $table->dropColumn('isbLibro');
        });
        Schema::table('clientes', function(Blueprint $table){
            $table->dropColumn('idPersona');
        });
        Schema::table('personas', function(Blueprint $table){
            $table->dropColumn('idBiblioteca');
        });
    }
}
