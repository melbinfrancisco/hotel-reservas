@extends('Madre.pag_principal')

@section('titulo', 'Agregar Nueva Habitación')

@section('contenido')
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Agregar Nueva Habitación') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('habitacion.guardar') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="numero" class="form-label">{{ __('Número') }}</label>
                                <input type="number" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero" required value="{{ old('numero') }}">
                                @error('numero')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tipo" class="form-label">{{ __('Tipo') }}</label>
                                <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                                    <option value="Individual">Individual</option>
                                    <option value="Doble">Doble</option>
                                    <option value="Twin">Twin</option>
                                    <option value="Suite">Suite</option>
                                    <option value="Triple">Triple</option>
                                    <option value="Quad">Quad</option>
                                </select>
                                @error('tipo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="precio" class="form-label">{{ __('Precio') }}</label>
                                <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" required value="{{ old('precio') }}">
                                @error('precio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3">{{ __('Guardar') }}</button>
                                <a href="{{ route('habitacion.index') }}" class="btn btn-danger mt-3">{{ __('Cancelar') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


