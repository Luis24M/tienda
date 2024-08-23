<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveIdVentaFromBoletas extends Migration
{
    public function up()
    {
        Schema::table('boletas', function (Blueprint $table) {
            $table->dropForeign(['id_venta']); // Elimina la clave foránea
            $table->dropColumn('id_venta'); // Luego elimina la columna
        });
    }

    public function down()
    {
        Schema::table('boletas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_venta')->nullable();
            $table->foreign('id_venta')->references('id')->on('ventas'); // Restaura la clave foránea
        });
    }
}
