<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    // Atributos que se pueden cambiar fácilmente
    protected $fillable = ['numero', 'tipo', 'precio'];
    use HasFactory;
    public function reservas()
    {
        return $this->hasMany(Reserva::class);  // Una Habitacion puede tener varios registros de Reserva asociados.
    }
    
}
