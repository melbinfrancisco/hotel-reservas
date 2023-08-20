<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reserva;
use App\Models\Habitacion;
use App\Models\Huesped;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     /*     $table->id();
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->unsignedBigInteger('habitacion_id');
            $table->unsignedBigInteger('huesped_id');
            $table->integer('numero_de_huespedes');
            $table->timestamps();

            $table->foreign('habitacion_id')->references('id')->on('habitacions');
            $table->foreign('huesped_id')->references('id')->on('huespeds'); */
    public function definition(): array
    {
        
        return [
            'fecha_entrada' => fake()->dateTimeBetween('-1 week', 'now'),
            'fecha_salida' => fake()->dateTimeBetween('+1 week', '+2 week'),
            'habitacion_id' => Habitacion::inRandomOrder()->first()->id,
            'huesped_id' => Huesped::inRandomOrder()->first()->id,
            'numero_de_huespedes' => fake()->numberBetween(1, 5),
        ];
    }

}
