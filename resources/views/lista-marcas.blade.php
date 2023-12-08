@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Marcas de Vehículos</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-nueva-marca">
                    Crear Nueva Marca
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha de Creación</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marcas as $marca)
                    <tr>
                        <td>{{ $marca->id }}</td>
                        <!-- Mostramos solo la fecha sin la hora -->
                        <td>{{ $marca->created_at->format('Y-m-d') }}</td>
                        <td>{{ $marca->nombre }}</td>
                        <td>{{ $marca->estado }}</td>
                        <td>
                            <a href="{{ route('editar-marca', $marca->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('eliminar-marca', $marca->id) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Nueva Marca -->
    <div class="modal fade" id="modal-nueva-marca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para crear nueva marca -->
                    <form method="POST" action="{{ route('guardar-marca') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre de la Marca</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" required>
                        </div>
                        <button type="submit" class="btn btn-success">Guardar Marca</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection