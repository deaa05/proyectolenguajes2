<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Editar Solicitud</h2>

    <form action="{{ route('solicitud.update', $solicitud->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('solicitud.form')

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('solicitud.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
