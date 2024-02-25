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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('imei',100);
            $table->string('precio',25);
            $table->string('color',100);
            $table->string('almacenamiento',25);
            $table->string('ran',25);
            $table->string('cantidad',25);
            $table->string('descricion',255);
            $table->string('categoria_uuid',255);
            $table->enum('estado',array('En almacen','Retirado'));
            $table->foreignId('id_proveedor')->constrained('proveedors')->onUpdate('cascade')->onDelete('restrict')->nullable();
            $table->foreignId('id_categoria')->constrained('categorias')->onUpdate('cascade')->onDelete('restrict')->nullable();
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
        Schema::dropIfExists('articulos');
    }
};
