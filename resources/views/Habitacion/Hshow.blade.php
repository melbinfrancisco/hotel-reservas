@extends('Madre.pag_principal')

@section('titulo', 'Detalles de Habitación')

@section('contenido')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Detalles de la Habitación</h2>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Habitación ID:</h5>
                        <p class="card-text">{{ $habitacion->id }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Número:</h5>
                        <p class="card-text">{{ $habitacion->numero }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Tipo:</h5>
                        <p class="card-text">{{ $habitacion->tipo }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-subtitle">Precio:</h5>
                        <p class="card-text">{{ $habitacion->precio }}</p>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('habitacion.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

