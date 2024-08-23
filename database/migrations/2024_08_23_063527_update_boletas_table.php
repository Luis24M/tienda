<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBoletasTable extends Migration
{
    public function up()
    {
        Schema::table('boletas', function (Blueprint $table) {
            // Eliminar la clave foránea existente, si hay una
            $table->dropForeign(['id_vendedor']);

            // Cambiar la referencia a la tabla `users`
            $table->foreign('id_vendedor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('boletas', function (Blueprint $table) {
            // Revertir los cambios
            $table->dropForeign(['id_vendedor']);
            $table->foreign('id_vendedor')->references('id')->on('vendedores')->onDelete('cascade');
        });
    }
}
