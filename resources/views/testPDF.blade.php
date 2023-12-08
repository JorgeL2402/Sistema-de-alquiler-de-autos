<!DOCTYPE html>
<html>

<head>
    <title>Reporte de Autos Disponibles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .header p {
            margin: 5px 0 0;
            color: #666;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>AUTOVEX</h1>
        <p>Tu mejor opción para alquiler de autos</p>
    </div>

    <h2>{{ $title }}</h2>

    <table>
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Categoría</th>
                <th>Marca</th>
                <!-- Agrega más columnas según sea necesario -->
            </tr>
        </thead>
        <tbody>
            @foreach($autosDisponibles as $auto)
            <tr>
                <td>{{ $auto->modelo }}</td>
                <td>{{ $auto->categoria->categoria }}</td>
                <td>{{ $marcas[$auto->marca] ?? 'Sin marca' }}</td>
                <!-- Agrega más columnas según sea necesario -->
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
