@extends('adminlte::page')

@section('content')
    <h1>Crear Automóvil</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('guardar-automovil') }}">
                        @csrf
                        <div class="form-group">
                            <label for="fecha_creacion">Fecha de Creación</label>
                            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" required>
                        </div>

                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" required>
                        </div>

                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                        </div>
                        <div class="form-group">
                            <label for="categoria_id">Categoría</label>
                            <select class="form-control" id="categoria_id" name="categoria_id" required>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" required>
                        </div>

                        <div class="form-group">
                            <label for="informacion_vehiculo">Información del Vehículo</label>
                            <textarea class="form-control" id="informacion_vehiculo" name="informacion_vehiculo" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado" required>
                                <option value="Disponible">Disponible</option>
                                <option value="Alquilado">Alquilado</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Guardar</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
