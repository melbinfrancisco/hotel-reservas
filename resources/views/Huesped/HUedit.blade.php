@extends('Madre.pag_principal')

@section('titulo', 'Editar Huésped')

@section('contenido')
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ __('Editar Huésped') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('huesped.update', ['id' => $huesped->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" required value="{{old('nombre') ?? $huesped->nombre}}">
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label">{{ __('Apellido') }}</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" required value="{{old('apellido') ?? $huesped->apellido}}">
                                @error('apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="correo_electronico" class="form-label">{{ __('Correo') }}</label>
                                <input type="text" class="form-control @error('correo_electronico') is-invalid @enderror" id="correo_electronico" name="correo_electronico" required value="{{old('correo_electronico') ?? $huesped->correo_electronico}}">
                                @error('correo_electronico')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">{{ __('Teléfono') }}</label>
                                <input type="number" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" required value="{{old('telefono') ?? $huesped->telefono}}">
                                @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3">{{ __('Actualizar') }}</button>
                                <a href="{{ route('huesped.index') }}" class="btn btn-danger mt-3">{{ __('Cancelar') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

