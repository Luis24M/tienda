<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdBoletaToVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_boleta')->nullable()->after('id'); // Añadir la columna id_boleta
            $table->foreign('id_boleta')->references('id')->on('boletas')->onDelete('cascade'); // Crear la clave foránea
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropForeign(['id_boleta']); // Eliminar la clave foránea
            $table->dropColumn('id_boleta'); // Eliminar la columna
        });
    }
}
