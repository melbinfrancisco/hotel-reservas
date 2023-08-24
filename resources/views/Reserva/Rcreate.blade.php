@extends('Madre.pag_principal')

@section('titulo', 'Crear Reserva')

@section('contenido')
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Nueva Reserva') }}</div>

                    <div class="card-body">
                        <form action="{{ route('reserva.guardar') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="fecha_entrada" class="form-label">{{ __('Fecha de entrada') }}</label>
                                <input type="date" name="fecha_entrada" required class="form-control @error('fecha_entrada') is-invalid @enderror" value="{{ old('fecha_entrada') }}">
                                @error('fecha_entrada')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fecha_salida" class="form-label">{{ __('Fecha de salida') }}</label>
                                <input type="date" name="fecha_salida" required class="form-control @error('fecha_salida') is-invalid @enderror" value="{{ old('fecha_salida') }}">
                                @error('fecha_salida')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="habitacion_id" class="form-label">{{ __('ID de Habitación') }}</label>
                                <input type="number" name="habitacion_id" required class="form-control @error('habitacion_id') is-invalid @enderror" value="{{ old('habitacion_id') }}">
                                @error('habitacion_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="huesped_id" class="form-label">{{ __('ID de Huésped') }}</label>
                                <input type="number" name="huesped_id" required class="form-control @error('huesped_id') is-invalid @enderror" value="{{ old('huesped_id') }}">
                                @error('huesped_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="numero_de_huespedes" class="form-label">{{ __('Número de huéspedes') }}</label>
                                <input type="number" name="numero_de_huespedes" required class="form-control @error('numero_de_huespedes') is-invalid @enderror" value="{{ old('numero_de_huespedes') }}" max="5">
                                @error('numero_de_huespedes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Guardar Reserva') }}</button>
                                <a href="{{ route('reserva.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

