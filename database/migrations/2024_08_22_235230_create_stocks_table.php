<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_talla');
            $table->integer('cantidad');
            $table->integer('umbral_minimo')->default(0);
            $table->timestamps();

            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('id_talla')->references('id')->on('tallas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
