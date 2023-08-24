<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reserva extends Model
{
    use HasFactory;

    // Atributos que se pueden cambiar fácilmente
    protected $fillable = [
        'fecha_entrada', 'fecha_salida', 'habitacion_id', 'huesped_id', 'numero_de_huespedes' // Agrega otros atributos aquí si es necesario
        // ...
    ];
}
