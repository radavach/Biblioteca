<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');//Este sera el nombre completo, para agilizar las cosas
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('nombre');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno')->nullable();
            $table->string('nombreUsuario');
            $table->string('telefono')->nullable();
            $table->string('direccion');
            $table->string('rfc')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('esAdmin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
