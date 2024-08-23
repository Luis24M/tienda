<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendedoresTable extends Migration
{
    public function up()
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('salario', 10, 2);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla `users`
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendedores');
    }
}

