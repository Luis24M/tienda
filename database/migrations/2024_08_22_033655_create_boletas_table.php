<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletasTable extends Migration
{
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->date('fecha');
            $table->foreignId('id_vendedor')->constrained('vendedores');
            $table->foreignId('id_venta')->constrained('ventas');
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('boletas');
    }
}

