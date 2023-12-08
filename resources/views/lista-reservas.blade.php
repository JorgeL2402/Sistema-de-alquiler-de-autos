@extends('adminlte::page')

@section('content')
    <h1>Listado de Reservas</h1>

    <!-- Tabla de reservas -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha de Reserva</th>
                <th>Horario de Alquiler</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->fecha_reserva }}</td>
                    <td>{{ $reserva->horario_alquiler }}</td>
                    <td>{{ $reserva->cliente }}</td>
                    <td>{{ $reserva->estado }}</td>
                    <td><!-- Botones de acción aquí --></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
