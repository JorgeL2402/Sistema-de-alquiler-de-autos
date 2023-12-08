<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTOVEX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-RBRQZQvCTiOZCJG0JWmQX0Nz5h4B9sXH9wZG8D7iEpbQW5wXrMFp1zS6D0F5Q0OOzwaZfTg0w8SWlCv8e3n8+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .btn-margin-right {
            margin-right: 5px;
        }
        
        .btn-outline-success {
            border-color: #007bff;
            color: #007bff;
        }
        
        .btn-outline-success:hover {
            background-color: #007bff !important;
            color: #fff !important;
        }
        
        .navbar-brand .fa-icon {
            margin-right: 5px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            AUTOVEX
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Categoría
              </a>
              <div class="dropdown-menu">
                  @foreach ($categorias as $categoria)
                      <a class="dropdown-item" href="#">{{ $categoria->categoria }}</a>
                  @endforeach
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Marcas
              </a>
              <div class="dropdown-menu">
                  @foreach ($marcas as $marca)
                      <a class="dropdown-item" href="#">{{ $marca->nombre }}</a>
                  @endforeach
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link disabled">Acerca de</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0 btn-margin-right" type="submit">Search</button>
            <button class="btn btn-outline-light my-2 my-sm-0" type="button">Ingresar</button>
          </form>
        </div>
    </nav>

    {{-- Banner con título de la empresa --}}
    <section id="banner" class="bg-info text-white text-center py-4">
        <h1 class="display-4">AUTOVEX</h1>
        <p class="lead">Tu mejor opción para alquiler de autos</p>
    </section>

  <body>
    <div class="container mt-4">
      <section id="autos-disponibles">
          <h2>Autos Disponibles para Alquiler</h2>

          <div class="row">
              @foreach ($autos as $auto)
                  <div class="col-md-4 mb-4">
                      <a href="{{ route('detalle-auto', ['id' => $auto->id]) }}">
                          <div class="card">
                              @if ($auto->miniatura)
                                  <img src="{{ asset('storage/miniaturas/' . basename($auto->miniatura)) }}" class="card-img-top" alt="{{ $auto->modelo }}">
                              @endif
                              <div class="card-body">
                                  <h5 class="card-title">{{ $auto->modelo }}</h5>
                                  <p class="card-text">{{ $auto->descripcion }}</p>
                                  <p class="card-text"><strong>Tarifa Diaria:</strong> {{ $auto->tarifa_diaria }}</p>
                                  <p class="card-text"><strong>Marca:</strong> {{ optional($marcas->where('id', $auto->marca)->first())->nombre }}</p>
                                  <p class="card-text"><strong>Categoría:</strong> {{ $auto->categoria->categoria }}</p>
                                  <!-- Otros detalles que desees mostrar -->
                              </div>
                          </div>
                      </a>
                  </div>

                  @if ($loop->iteration % 3 == 0 && !$loop->last)
                      </div><div class="row">
                  @endif
              @endforeach
          </div>
      </section>
  </div>
<!-- Modal de Inicio de Sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <!-- Formulario de inicio de sesión -->
              <form>
                  <div class="form-group">
                      <label for="inputEmail">Correo Electrónico:</label>
                      <input type="email" class="form-control" id="inputEmail" placeholder="Ingrese su correo">
                  </div>
                  <div class="form-group">
                      <label for="inputPassword">Contraseña:</label>
                      <input type="password" class="form-control" id="inputPassword" placeholder="Ingrese su contraseña">
                  </div>
                  <button type="submit" class="btn btn-primary">Ingresar</button>
              </form>

              <!-- Enlace para crear cuenta -->
              <div class="mt-3">
                  ¿No tienes una cuenta? <a href="#">Crear cuenta</a>
              </div>
          </div>
          <div class="modal-footer">
              <!-- Botón de cerrar el modal -->
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<script>
  $(document).ready(function () {
      // Evento clic del botón "Ingresar"
      $('#btnIngresar').on('click', function () {
          $('#loginModal').modal('show');
      });
  });
</script>


</body>
</html>