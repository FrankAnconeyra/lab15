<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescripcionToFotosTable extends Migration
{
    public function up()
    {
        Schema::table('fotos', function (Blueprint $table) {
            $table->string('descripcion')->nullable(); // Esto agregará la columna 'descripcion'
        });
    }

    public function down()
    {
        Schema::table('fotos', function (Blueprint $table) {
            $table->dropColumn('descripcion'); // Si necesitas revertir la migración, eliminará la columna
        });
    }
}
