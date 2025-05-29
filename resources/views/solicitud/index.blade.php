<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Solicitudes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Listado de Solicitudes</h2>
    <a href="{{ route('solicitud.create') }}" class="btn btn-success mb-3">Nueva Solicitud</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tema</th>
                <th>Aera</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Fecha Registro</th>
                <th>Última Actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->id }}</td>
                    <td>{{ $solicitud->tema }}</td>
                    <td>{{ $solicitud->aera }}</td>
                    <td>{{ $solicitud->estado }}</td>
                    <td>{{ $solicitud->usuario ? 'Sí' : 'No' }}</td>
                     <td>{{ \Carbon\Carbon::parse($solicitud->created_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($solicitud->updated_at)->format('d/m/Y H:i') }}</td>

                    <td>
                        <a href="{{ route('solicitud.edit', $solicitud->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('solicitud.destroy', $solicitud->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta solicitud?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
