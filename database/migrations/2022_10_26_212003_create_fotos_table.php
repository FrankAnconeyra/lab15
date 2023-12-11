<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('ruta');
            $table->integer('estado');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('descripcion')->nullable(); // Agregado para descripción
            $table->string('direccion')->nullable(); // Agregado para dirección
            $table->integer('cuartos_disponibles')->nullable(); // Agregado para cuartos disponibles
            $table->string('tipo_habitacion')->nullable(); // Agregado para tipo de habitación
            $table->string('hotel')->nullable(); // Agregado para hotel
            $table->string('provincia')->nullable(); // Agregado para provincia
            $table->string('distrito')->nullable(); // Agregado para distrito
            $table->dropColumn('precio_noche');
            $table->dropColumn('precio_semana');
            $table->dropColumn('precio_mes');
            $table->dropColumn('reserva');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fotos');
    }
};
