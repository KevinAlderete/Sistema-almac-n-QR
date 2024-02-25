<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('n_boleta',100);
            $table->string('dni',25);
            $table->string('nombre',255);
            $table->string('cantidad',100);
            $table->string('numero',100);
            $table->string('precio',100);
            $table->foreignId('id_categoria')->constrained('categorias')->onUpdate('cascade')->onDelete('restrict')->nullable();
            $table->foreignId('id_articulo')->constrained('articulos')->onUpdate('cascade')->onDelete('restrict')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
