@extends('Madre.pag_principal')

@section('titulo', 'Agregar Nueva Huésped')

@section('contenido')
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Agregar Nuevo Huésped') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('huesped.guardar') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" required value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label">{{ __('Apellido') }}</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" required value="{{ old('apellido') }}">
                                @error('apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="correo_electronico" class="form-label">{{ __('Correo') }}</label>
                                <input type="text" class="form-control @error('correo_electronico') is-invalid @enderror" id="correo_electronico" name="correo_electronico" required value="{{ old('correo_electronico') }}">
                                @error('correo_electronico')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">{{ __('Teléfono') }}</label>
                                <input type="number" title="8 dígitos" required class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" required value="{{ old('telefono') }}">
                                @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3">{{ __('Guardar') }}</button>
                                <a href="{{ route('huesped.index') }}" class="btn btn-danger mt-3">{{ __('Cancelar') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

