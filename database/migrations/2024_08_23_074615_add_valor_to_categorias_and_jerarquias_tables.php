<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValorToCategoriasAndJerarquiasTables extends Migration
{
    public function up()
    {
        // Agregar columna 'valor' a la tabla 'categorias'
        Schema::table('categorias', function (Blueprint $table) {
            $table->decimal('valor', 10, 2)->nullable(); // Ajusta el tamaño y precisión según tus necesidades
        });

        // Agregar columna 'valor' a la tabla 'jerarquias'
        Schema::table('jerarquias', function (Blueprint $table) {
            $table->decimal('valor', 10, 2)->nullable(); // Ajusta el tamaño y precisión según tus necesidades
        });
    }

    public function down()
    {
        // Eliminar columna 'valor' de la tabla 'categorias'
        Schema::table('categorias', function (Blueprint $table) {
            $table->dropColumn('valor');
        });

        // Eliminar columna 'valor' de la tabla 'jerarquias'
        Schema::table('jerarquias', function (Blueprint $table) {
            $table->dropColumn('valor');
        });
    }
}
