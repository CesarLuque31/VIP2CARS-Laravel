<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->year('anio_fabricacion');
            $table->string('cliente_nombre');
            $table->string('cliente_apellido');
            $table->string('cliente_documento');
            $table->string('cliente_correo');
            $table->string('cliente_telefono');
            $table->boolean('esta_activo')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
};