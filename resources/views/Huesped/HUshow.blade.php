@extends('Madre.pag_principal')

@section('titulo', 'Detalles de Habitación')

@section('contenido')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Detalles del Huesped</h2>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Huésped ID:</h5>
                        <p class="card-text">{{ $huesped->id }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Nombre:</h5>
                        <p class="card-text">{{ $huesped->nombre }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Apellido:</h5>
                        <p class="card-text">{{ $huesped->apellido }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Correo:</h5>
                        <p class="card-text">{{ $huesped->correo_electronico }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Teléfono:</h5>
                        <p class="card-text">{{ $huesped->telefono }}</p>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('huesped.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection