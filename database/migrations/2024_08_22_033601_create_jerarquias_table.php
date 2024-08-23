<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJerarquiasTable extends Migration
{
    public function up()
    {
        Schema::create('jerarquias', function (Blueprint $table) {
            $table->id();  // Cambiado a 'bigIncrements'
            $table->string('nombre');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jerarquias');
    }
}
