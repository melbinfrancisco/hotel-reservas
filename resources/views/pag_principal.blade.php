<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Reservas</title>
    </head>

    <body>
    <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
  <a class="navbar-brand" href="#">Hotel DANLI</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading1">Precios</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading2">Habitaciones</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Mas</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#scrollspyHeading3">Espacios</a></li>
        <li><a class="dropdown-item" href="#scrollspyHeading4">Ayuda</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#scrollspyHeading5">Sobre Nosotros</a></li>
      </ul>
    </li>
  </ul>
</nav>
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
  <h4 id="scrollspyHeading1">Primer encabezado</h4>
  <p>bootstrap/
├── css/
│   ├── bootstrap-grid.css
│   ├── bootstrap-grid.css.map
│   ├── bootstrap-grid.min.css
│   ├── bootstrap-grid.min.css.map
│   ├── bootstrap-grid.rtl.css
│   ├── bootstrap-grid.rtl.css.map
│   ├── bootstrap-grid.rtl.min.css
│   ├── bootstrap-grid.rtl.min.css.map
│   ├── bootstrap-reboot.css
│   ├── bootstrap-reboot.css.map
│   ├── bootstrap-reboot.min.css
│   ├── bootstrap-reboot.min.css.map
│   ├── bootstrap-reboot.rtl.css
│   ├── bootstrap-reboot.rtl.css.map
│   ├── bootstrap-reboot.rtl.min.css
│   ├── bootstrap-reboot.rtl.min.css.map
│   ├── bootstrap-utilities.css
│   ├── bootstrap-utilities.css.map
│   ├── bootstrap-utilities.min.css
│   ├── bootstrap-utilities.min.css.map
│   ├── bootstrap-utilities.rtl.css
│   ├── bootstrap-utilities.rtl.css.map
│   ├── bootstrap-utilities.rtl.min.css
│   ├── bootstrap-utilities.rtl.min.css.map
│   ├── bootstrap.css
│   ├── bootstrap.css.map
│   ├── bootstrap.min.css
│   ├── bootstrap.min.css.map
│   ├── bootstrap.rtl.css
│   ├── bootstrap.rtl.css.map
│   ├── bootstrap.rtl.min.css
│   └── bootstrap.rtl.min.css.map
└── js/
    ├── bootstrap.bundle.js
    ├── bootstrap.bundle.js.map
    ├── bootstrap.bundle.min.js
    ├── bootstrap.bundle.min.js.map
    ├── bootstrap.esm.js
    ├── bootstrap.esm.js.map
    ├── bootstrap.esm.min.js
    ├── bootstrap.esm.min.js.map
    ├── bootstrap.js
    ├── bootstrap.js.map
    ├── bootstrap.min.js
    └── bootstrap.min.js.map</p>
  <h4 id="scrollspyHeading2">Segundo encabezado</h4>
  <p>Esta es la forma más básica de Bootstrap: archivos precompilados para un uso rápido en casi cualquier proyecto web. Proporcionamos CSS y JS compilados (bootstrap.*), así como CSS y JS compilados y minimizados (bootstrap.min.*). Los mapas de origen (bootstrap.*.map) están disponibles para su uso con las herramientas de desarrollo de ciertos navegadores. Los archivos JS incluidos (bootstrap.bundle.js y bootstrap.bundle.min.js minificado) incluyen Popper. 
  bootstrap/
├── dist/
│   ├── css/
│   └── js/
├── site/
│   └──content/
│      └── docs/
│          └── 5.1/
│              └── examples/
├── js/
└── scss/
  </p>
  <h4 id="scrollspyHeading3">Tercer encabezado</h4>
  <p>...</p>
  <h4 id="scrollspyHeading4">Cuarto encabezado</h4>
  <p>...</p>
  <br><br><br>
  <h4 id="scrollspyHeading5">Quinto encabezado</h4>
  <p>scss/ y js/ son el código fuente de nuestro CSS y JavaScript. La carpeta dist/ incluye todo lo enumerado en la sección anterior de descarga precompilada. La carpeta site/docs/ incluye el código fuente de nuestra documentación y examples/ del uso de Bootstrap. Más allá de eso, cualquier otro archivo incluido brinda soporte para paquetes, información de licencia y desarrollo.</p>
</div>
    </body>

</html>