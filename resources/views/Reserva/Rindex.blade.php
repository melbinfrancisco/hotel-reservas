@extends('Madre.pag_principal')

@section('titulo', 'index')

@section('contenido')

@if(session('mensaje'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <strong>¡Atención!</strong> {{ session('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <h1 class="text-center mb-4">Reservas</h1>

    <div class="container">
    <div class="text-center mt-4">
        <a class="btn btn-primary" href="{{ route('reserva.crear') }}">Nuevo</a>
    </div>
    <br>
    <!-- Función BUSCAR-->
    <form action="{{ route('reserva.index') }}" method="GET" class="d-flex">
            <input type="text" name="buscar" class="form-control me-2" placeholder="Buscar reserva">
            <button type="submit" style="width: 10%; background-color: navy;" class="btn btn-primary">Buscar</button>
    </form>
<!-- Función BUSCAR-->
    <br>
    <div class="table-responsive text-center"> <!-- Aplicar alineación centrada a la tabla -->
        <table class="table table-bordered align-middle"> <!-- Agregar clase align-middle para centrar contenido verticalmente -->
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha de entrada</th>
                    <th>Fecha de salida</th>
                    <th>ID de Habitación</th>
                    <th>ID de Huésped</th>
                    <th>Número de huéspedes</th>
                    <th style="width: 10%; background-color: navy;" >Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->fecha_entrada }}</td>
                    <td>{{ $reserva->fecha_salida }}</td>
                    <td>{{ $reserva->habitacion_id }}</td>
                    <td>{{ $reserva->huesped_id }}</td>
                    <td>{{ $reserva->numero_de_huespedes }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('reserva.editar', ['id'=>$reserva->id])}}" class="btn btn-warning me-2">Editar</a>
                            <a href="{{route('reserva.show', ['id'=>$reserva->id])}}" class="btn btn-info me-2">Ver</a>
                            <a href="{{route('reserva.borrar', ['id'=>$reserva->id])}}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal{{ $reserva->id }}">Eliminar</a>
                            <!-- Modal de Confirmación de Eliminación -->
                            <div class="modal fade" id="eliminarModal{{ $reserva->id }}" tabindex="-1" aria-labelledby="eliminarModalLabel{{ $reserva->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarModalLabel{{ $reserva->id }}">Confirmar Eliminación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar el huesped con id {{$reserva->id}}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('reserva.borrar', ['id' => $reserva->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Sin reservas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $reservas->render('pagination::bootstrap-4') }}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Cerrar automáticamente el mensaje de confirmación después de 5 segundos
    setTimeout(function() {
        $('.alert-dismissible').alert('close');
    }, 3000); // 5000 milisegundos = 5 segundos
</script>
@endsection