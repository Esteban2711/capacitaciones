<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradoresTable extends Migration
{
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo_electronico')->unique();
            $table->string('contrasena');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('administradores');
    }
}