@extends('adminlte::page')

@section('content')
    <!-- Tabla de categorías -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de categorias</h3>
            <div class="card-tools">
                <!-- Botón para crear nueva categoría -->
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-nueva-categoria">
                    Crear Nueva Categoría
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover" id="categorias-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha de Creación</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->created_at }}</td>
                            <td>{{ $categoria->categoria }}</td>
                            <td>{{ $categoria->descripcion }}</td>
                            <td>{{ $categoria->estado }}</td>
                            <td>
                                <a href="{{ route('editar-categoria', $categoria->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                <a href="{{ route('eliminar-categoria', $categoria->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para crear nueva categoría -->
    <div class="modal fade" id="modal-nueva-categoria" tabindex="-1" role="dialog" aria-labelledby="modal-nueva-categoria-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modal-nueva-categoria-label">Crear Nueva Categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('guardar-categoria') }}">
                        @csrf
                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" required>
                            
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection