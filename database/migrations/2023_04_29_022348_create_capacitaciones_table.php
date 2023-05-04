<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitacionesTable extends Migration
{
    public function up()
    {
        Schema::create('capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('cupo');
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('capacitaciones');
    }
}