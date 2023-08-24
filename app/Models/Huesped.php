<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huesped extends Model
{
    // Atributos que se pueden cambiar fácilmente
    protected $fillable = ['nombre', 'apellido', 'correo_electronico', 'telefono'];
    use HasFactory;
    public function reservas()
    {
        return $this->hasMany(Reserva::class); // Un Huésped puede tener varios registros de Reserva asociados.
    }
    
}
