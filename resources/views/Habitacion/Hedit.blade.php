@extends('Madre.pag_principal')

@section('titulo', 'Editar Habitación')

@section('contenido')
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ __('Editar Habitación') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('habitacion.update', ['id' => $habitacion->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="numero" class="form-label">{{ __('Número') }}</label>
                                <input type="number" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero" value="{{old('numero') ?? $habitacion->numero}}" required>
                                @error('numero')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tipo" class="form-label">{{ __('Tipo') }}</label>
                                <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                                    <option value="Individual" {{ (old('tipo') ?? $habitacion->tipo) === 'Individual' ? 'selected' : '' }}>Individual</option>
                                    <option value="Doble" {{ (old('tipo') ?? $habitacion->tipo) === 'Doble' ? 'selected' : '' }}>Doble</option>
                                    <option value="Twin" {{ (old('tipo') ?? $habitacion->tipo) === 'Twin' ? 'selected' : '' }}>Twin</option>
                                    <option value="Suite" {{ (old('tipo') ?? $habitacion->tipo) === 'Suite' ? 'selected' : '' }}>Suite</option>
                                    <option value="Triple" {{ (old('tipo') ?? $habitacion->tipo) === 'Triple' ? 'selected' : '' }}>Triple</option>
                                    <option value="Quad" {{ (old('tipo') ?? $habitacion->tipo) === 'Quad' ? 'selected' : '' }}>Quad</option>
                                </select>
                                @error('tipo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="precio" class="form-label">{{ __('Precio') }}</label>
                                <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" required value="{{old('precio') ?? $habitacion->precio}}">
                                @error('precio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3">{{ __('Actualizar') }}</button>
                                <a href="{{ route('habitacion.index') }}" class="btn btn-danger mt-3">{{ __('Cancelar') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




