<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Autos Disponibles</title>
</head>
<body>
    <h1>Reporte de Autos Disponibles</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Marca</th>
                <!-- Agrega más columnas según tus necesidades -->
            </tr>
        </thead>
        <tbody>
            @foreach ($autosDisponibles as $auto)
                <tr>
                    <td>{{ $auto->id }}</td>
                    <td>{{ optional($auto->categoria)->categoria ?? 'Sin categoría' }}</td>
                    <td>{{ $marcas[$auto->marca] ?? 'Sin marca' }}</td>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
