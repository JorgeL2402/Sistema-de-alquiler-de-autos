<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalNewAutomovilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalnewautomovil', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('categoria_id')->constrained(); // Relación con la tabla de categorías
            $table->string('marca');
            $table->string('modelo');
            $table->text('informacion_vehiculo');
            $table->integer('cantidad');
            $table->enum('estado', ['Disponible', 'Alquilado']);
            $table->integer('unidades_disponibles');
            $table->decimal('tarifa_diaria', 8, 2);
            $table->text('descripcion');
            $table->string('miniatura');
            $table->json('imagenes'); // Almacenar las rutas de las imágenes como un arreglo JSON
            // Agrega aquí tus columnas adicionales según tus necesidades
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modalnewautomovil');
    }
}
