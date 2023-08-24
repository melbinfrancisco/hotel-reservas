@extends('Madre.pag_principal')

@section('titulo', 'Detalles de Habitación')

@section('contenido')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Detalles de la Reserva</h2>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Reserva ID:</h5>
                        <p class="card-text">{{ $reserva->id }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Fecha de entrada:</h5>
                        <p class="card-text">{{ $reserva->fecha_entrada }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Fecha de salida:</h5>
                        <p class="card-text">{{ $reserva->fecha_salida }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">ID de Habitación:</h5>
                        <p class="card-text">{{ $reserva->habitacion_id }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">ID de Huésped:</h5>
                        <p class="card-text">{{ $reserva->huesped_id }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Numero de huéspedes:</h5>
                        <p class="card-text">{{ $reserva->numero_de_huespedes }}</p>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('reserva.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection