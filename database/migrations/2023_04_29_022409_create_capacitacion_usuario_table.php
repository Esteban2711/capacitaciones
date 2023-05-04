<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitacionUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('capacitacion_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('capacitacion_id');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('capacitacion_id')->references('id')->on('capacitaciones')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('capacitacion_usuario');
    }
}