@extends('adminlte::page')

@section('title', 'Catálogo de Automóviles')

@section('content')
    @auth
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Automóviles</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#crearAutomovilModal">
                        Crear Automóvil
                    </button>
                    <a href="{{ route('generate-pdf') }}" class="btn btn-primary" target="_blank">
                        Imprimir Reporte
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de Creación</th>
                                <th>Categoría</th>
                                <th>Información del Vehículo</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop para mostrar los automóviles --}}
                            @foreach ($autos as $auto)
                                <tr>
                                    <td>{{ $auto->id }}</td>
                                    <td>{{ $auto->created_at }}</td>
                                    <td>{{ optional($auto->categoria)->categoria ?? 'Sin categoría' }}</td>
                                    <td>
                                        <strong>Modelo:</strong> {{ $auto->modelo }}<br>
                                        <strong>Marca:</strong> {{ $marcas[$auto->marca] ?? 'Sin marca' }}
                                    </td>
                                    <td>{{ $auto->cantidad }}</td>
                                    <td>{{ $auto->estado }}</td>
                                    <td>
                                        {{-- Puedes agregar más acciones según tus necesidades --}}
                                        <a href="{{ route('detalles-automovil', ['id' => $auto->id]) }}" class="btn btn-primary"
                                            data-toggle="modal" data-target="#detallesModal{{ $auto->id }}">
                                            <i class="fas fa-eye"></i> Detalles
                                        </a>
                                        <button type="button" class="btn btn-warning editModalButton" data-toggle="modal" data-target=""
                                        onclick="openEditModal({{ $auto->id }})">
                                        <i class="fas fa-edit"></i> Editar
                                    </button>
                                    
                                        


                                    </td>
                                </tr>
                                <!-- Modal de detalles -->
                                <div class="modal fade" id="detallesModal{{ $auto->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="detallesModalLabel{{ $auto->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="detallesModalLabel{{ $auto->id }}">Detalles del
                                                    Automóvil</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Aquí puedes mostrar los detalles del automóvil -->
                                                <p><strong>Categoría:</strong>
                                                    {{ $auto->categoria->categoria ?? 'Sin categoría' }}</p>
                                                <p><strong>Modelo:</strong> {{ $auto->modelo }}</p>
                                                <p><strong>Marca:</strong> {{ $marcas[$auto->marca] ?? 'Sin marca' }}</p>
                                                <p><strong>Cantidad:</strong> {{ $auto->cantidad }}</p>
                                                <p><strong>Estado:</strong> {{ $auto->estado }}</p>
                                                <p><strong>Unidades Disponibles:</strong> {{ $auto->unidades_disponibles }}</p>
                                                <p><strong>Tarifa Diaria:</strong> {{ $auto->tarifa_diaria }}</p>
                                                <p><strong>Descripción:</strong> {{ $auto->descripcion }}</p>
                                                <!-- Puedes agregar más detalles según tus necesidades -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal para editar automóvil -->
                                <div class="modal fade" id="editarAutomovilModal{{ $auto->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editarAutomovilModalLabel{{ $auto->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-white">
                                                <h5 class="modal-title" id="editarAutomovilModalLabel{{ $auto->id }}">
                                                    Editar Automóvil</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulario de edición -->
                                                <form method="POST" action="{{ route('actualizar-automovil', ['id' => $auto->id]) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="cantidad">Cantidad:</label>
                                                        <input type="number" name="cantidad" id="cantidad"
                                                            class="form-control">
                                                        @error('cantidad')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="estado">Estado:</label>
                                                        <select name="estado" id="estado" class="form-control">
                                                            <option value="Inactivo">Inactivo</option>
                                                            <option value="Activo">Activo</option>
                                                        </select>
                                                        @error('estado')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="unidades_disponibles">Unidades Disponibles:</label>
                                                        <input type="number" name="unidades_disponibles"
                                                            id="unidades_disponibles" class="form-control">
                                                        @error('unidades_disponibles')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tarifa_diaria">Tarifa Diaria:</label>
                                                        <input type="number" name="tarifa_diaria" id="tarifa_diaria"
                                                            step="0.01" class="form-control">
                                                        @error('tarifa_diaria')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="descripcion">Descripción:</label>
                                                        <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                                                        @error('descripcion')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>


                                                    <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            function openEditModal(autoId) {
                // Modificar el atributo data-target del botón para que apunte al modal correcto
                $('.editModalButton').attr('data-target', '#editarAutomovilModal' + autoId);
        
                // Mostrar el modal
                $('.editModalButton').click();
            }
        </script>
        
        

        <!-- Modal para crear automóvil -->
        <div class="modal fade" id="crearAutomovilModal" tabindex="-1" role="dialog"
            aria-labelledby="crearAutomovilModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="crearAutomovilModalLabel">Crear Automóvil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('guardar-automovil') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Campos del formulario -->
                            <div class="form-group">
                                <label for="categoria_id">Categoría:</label>
                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="" disabled selected>Seleccione una categoría</option>
                                    @foreach ($categorias as $id => $categoria)
                                        <option value="{{ $id }}">{{ $categoria }}</option>
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <select name="marca" id="marca" class="form-control">
                                    <option value="" disabled selected>Seleccione una marca</option>
                                    @foreach ($marcas as $nombre => $marca)
                                        <option value="{{ $nombre }}">{{ $marca }}</option>
                                    @endforeach
                                </select>
                                @error('marca')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="modelo">Modelo:</label>
                                <input type="text" name="modelo" id="modelo" class="form-control">
                                @error('modelo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control">
                                @error('cantidad')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="Inactivo">Inactivo</option>
                                    <option value="Activo">Activo</option>
                                </select>
                                @error('estado')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="unidades_disponibles">Unidades Disponibles:</label>
                                <input type="number" name="unidades_disponibles" id="unidades_disponibles"
                                    class="form-control">
                                @error('unidades_disponibles')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tarifa_diaria">Tarifa Diaria:</label>
                                <input type="number" name="tarifa_diaria" id="tarifa_diaria" step="0.01"
                                    class="form-control">
                                @error('tarifa_diaria')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                                @error('descripcion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="miniatura">Miniatura:</label>
                                <input type="file" name="miniatura" id="miniatura" class="form-control-file"
                                    accept="image/*">
                                @error('miniatura')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="imagenes">Imágenes (seleccione exactamente 4):</label>
                                <input type="file" name="imagenes[]" id="imagenes" class="form-control-file" multiple
                                    accept="image/*" />
                                @error('imagenes')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            @push('scripts')
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        document.getElementById('imagenes').addEventListener('change', function(event) {
                                            if (event.target.files.length > 4) {
                                                alert('Solo puedes subir un máximo de 4 imágenes.');
                                                this.value = ''; // Limpiar la selección
                                            }
                                        });
                                    });
                                </script>
                            @endpush

                            <!-- Botón para enviar el formulario -->
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Aquí puedes agregar la paginación si es necesario -->
        {{ $autos->links() }}

        <!-- Fin de la tabla -->
        @if (isset($autos))
            {{ $autos->links() }}
        @endif
        <!-- Fin de tu contenido existente -->
    @endsection

    @push('styles')
        <!-- Agrega el estilo de Easy Dynamic Tables -->
        <style>
            .table thead th {
                vertical-align: middle;
                text-align: center;
            }

            .table tbody td {
                vertical-align: middle;
                text-align: center;
            }
        </style>
    @endpush

    @push('scripts')
        <!-- Agrega el script de Easy Dynamic Tables si es necesario -->
        <!-- <script src="ruta/del/script.js"></script> -->
    @endpush
@endauth
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
@endpush
