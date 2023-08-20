<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Habitacion;
use App\Models\Huesped;
use App\Models\Reserva;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

     public function run(): void
    {
        $this->call(HabitacionsSeeder::class);
        $this->call(HuespedsSeeder::class);
        $this->call(ReservasSeeder::class);
        
    }
}
