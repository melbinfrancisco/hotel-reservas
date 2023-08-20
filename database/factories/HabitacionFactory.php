<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Habitacion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitacion>
 */
class HabitacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     /*     $table->id();
            $table->integer('numero');
            $table->string('tipo');
            $table->decimal('precio', 10, 2);
            $table->timestamps(); */
    public function definition(): array
    {
        return [
            'numero' => fake()->unique()->numberBetween(100, 1000),
            'tipo' => fake()->randomElement(['individual', 'doble', 'suite', 'triple', 'quad', 'twin']),
            'precio' => fake()->randomFloat(2, 50, 500)
        ];
    }
}
