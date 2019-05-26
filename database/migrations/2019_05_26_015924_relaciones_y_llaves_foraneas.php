<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionesYLLavesForaneas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('clientes', function(Blueprint $table){
            $table->unsignedInteger('biblioteca_id');
            
            $table->foreign('biblioteca_id')
                ->references('id')
                ->on('bibliotecas')
                ->onDelete('cascade');
        });
        
        Schema::table('users', function(Blueprint $table){
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
        
        Schema::table('ejemplarL', function(Blueprint $table){
            $table->unsignedInteger('libro_id');
            $table->foreign('libro_id')
                ->references('id')
                ->on('libros')
                ->onDelete('cascade');
        });
        
        Schema::table('movimientoL', function(Blueprint $table){
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');
                
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::table('ejemplarL_movimientoL', function(Blueprint $table){
            $table->unsignedInteger('ejemplar_id');
            $table->foreign('ejemplar_id')
                ->references('id')
                ->on('ejemplarL')
                ->onDelete('cascade');  
                
            $table->unsignedInteger('movimiento_id');
            $table->foreign('movimiento_id')
                ->references('id')
                ->on('movimientoL')
                ->onDelete('cascade');        
        });
        
        Schema::table('materiales', function(Blueprint $table){
            $table->unsignedInteger('biblioteca_id');
            $table->foreign('biblioteca_id')
                ->references('id')
                ->on('bibliotecas')
                ->onDelete('cascade');
        });
        
        Schema::table('ejemplarM', function(Blueprint $table){
            $table->unsignedInteger('material_id');
            $table->foreign('material_id')
                ->references('id')
                ->on('materiales')
                ->onDelete('cascade');
        });
        
        Schema::table('movimientoM', function(Blueprint $table){
            $table->unsignedInteger('ejemplarM_id');
            $table->foreign('ejemplarM_id')
                ->references('id')
                ->on('ejemplarM')
                ->onDelete('cascade');        

            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');
                
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::table('clientes', function(Blueprint $table){
            $table->dropColumn('biblioteca_id');
        });
        
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('biblioteca_id');
        });
        
        Schema::table('libros', function(Blueprint $table){
            $table->dropColumn('biblioteca_id');
        });
        
        Schema::table('ejemplarL', function(Blueprint $table){
            $table->dropColumn('libro_id');
        });
        
        Schema::table('movimientoL', function(Blueprint $table){
            $table->dropColumn('ejemplarL_id');
            $table->dropColumn('cliente_id');
            $table->dropColumn('user_id');
        });
        
        Schema::table('ejemplarL_movimientoL', function(Blueprint $table){
            $table->dropColumn('ejemplar_id');
            $table->dropColumn('movimiento_id');
        });
        
        Schema::table('materiales', function(Blueprint $table){
            $table->dropColumn('biblioteca_id');
        });
        
        Schema::table('ejemplarM', function(Blueprint $table){
            $table->dropColumn('material_id');
        });
        
        Schema::table('movimientoM', function(Blueprint $table){
            $table->dropColumn('ejemplarM_id');
            $table->dropColumn('cliente_id');
            $table->dropColumn('user_id');
        });
    }
}
