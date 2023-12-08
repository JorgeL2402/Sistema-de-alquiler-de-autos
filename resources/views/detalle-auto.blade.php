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

    {{-- Contenido de la vista --}}
    <div class="container mt-4">
        <div class="card">
            @if ($auto->miniatura)
                <img src="{{ asset('storage/miniaturas/' . $auto->miniatura) }}" class="card-img-top" alt="{{ $auto->modelo }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $auto->modelo }}</h5>
                <p class="card-text">{{ $auto->descripcion }}</p>
                <p class="card-text"><strong>Tarifa Diaria:</strong> {{ $auto->tarifa_diaria }}</p>
                <p class="card-text"><strong>Marca:</strong> {{ optional($marcas->where('id', $auto->marca)->first())->nombre }}</p>
                <p class="card-text"><strong>Categoría:</strong> {{ $auto->categoria->categoria }}</p>
                <!-- Otros detalles que desees mostrar -->

              <!-- Botón para mostrar el modal -->
            <button type="button" class="btn btn-primary" onclick="mostrarModal({{ $auto->id }})">
                Reservar Automóvil
            </button>
            </div>
        </div>
    </div>
    <!-- Modal para mostrar detalles del automóvil -->
<div class="modal" id="detallesAutomovilModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles del Automóvil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detallesAutomovilBody">
                <!-- Contenido del modal -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <!-- Agrega un botón de reservar o cualquier otra acción que desees -->
            </div>
        </div>
    </div>
</div>
<!-- Modal para iniciar sesión o crear cuenta -->
<div class="modal" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Iniciar Sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>
                <p class="mt-3">¿Aún no tienes una cuenta? <a href="#registerModal" data-toggle="modal" data-dismiss="modal">Crear cuenta</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal para crear cuenta -->
<div class="modal" id="registerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para crear cuenta -->
                <form id="registerForm">
                    <!-- Campos adicionales según tus necesidades -->
                    <div class="form-group">
                        <label for="newEmail">Correo Electrónico</label>
                        <input type="email" class="form-control" id="newEmail" name="newEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Contraseña</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Cuenta</button>
                </form>
                <p class="mt-3">¿Ya tienes una cuenta? <a href="#loginModal" data-toggle="modal" data-dismiss="modal">Iniciar Sesión</a></p>
            </div>
        </div>
    </div>
</div>


<script>
    function mostrarModal(id) {
        // Realiza una petición AJAX para obtener los detalles del automóvil
        $.ajax({
            url: '/reservar/' + id,
            type: 'GET',
            success: function (response) {
                // Rellena el contenido del modal con los detalles del automóvil
                $('#detallesAutomovilBody').html(
                    '<p><strong>Modelo:</strong> ' + response.automovil.modelo + '</p>' +
                    '<p><strong>Descripción:</strong> ' + response.automovil.descripcion + '</p>' +
                    // Agrega más detalles según sea necesario
                );

                // Muestra el modal
                $('#detallesAutomovilModal').modal('show');
            }
        });
    }
    $(document).ready(function() {
        // Manejar el envío del formulario de inicio de sesión
        $('#loginForm').submit(function(e) {
            e.preventDefault();

            // Realizar la lógica de inicio de sesión aquí, por ejemplo, mediante Ajax
            // ...

            // Cerrar el modal
            $('#loginModal').modal('hide');
        });

        // Manejar el envío del formulario de creación de cuenta
        $('#registerForm').submit(function(e) {
            e.preventDefault();

            // Realizar la lógica de creación de cuenta aquí, por ejemplo, mediante Ajax
            // ...

            // Cerrar el modal
            $('#registerModal').modal('hide');
        });
    });

</script>

    <!-- Scripts y pie de página -->
    <!-- ... (tus scripts y cierre de body/html) ... -->
</body>
</html>
