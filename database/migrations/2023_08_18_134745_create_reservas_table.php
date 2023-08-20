<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->unsignedBigInteger('habitacion_id');
            $table->unsignedBigInteger('huesped_id');
            $table->integer('numero_de_huespedes');
            $table->timestamps();

            $table->foreign('habitacion_id')->references('id')->on('habitacions');
            $table->foreign('huesped_id')->references('id')->on('huespeds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
