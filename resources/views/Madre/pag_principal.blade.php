<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos para el fondo y color del menú */
        .navbar-custom {
            background-color: #2c3e50; /* Fondo azul oscuro */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ecf0f1; /* Color del texto */
        }
        .navbar-custom .nav-link:hover {
            color: #e74c3c; /* Color del texto al pasar el mouse */
        }

        /* Estilos para el botón de menú */
        .navbar-toggler-icon {
            background-color: #ecf0f1; /* Color del icono del botón */
        }
        .navbar-toggler.collapsed .navbar-toggler-icon {
            background-color: #e74c3c; /* Color del icono al desplegar el menú */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield('titulo')</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hotel Melbin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('habitacion.index')}}">Habitaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('huesped.index')}}">Huéspedes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reserva.index')}}">Reservas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div>
    @yield('contenido')
</div>

</body>
</html>

