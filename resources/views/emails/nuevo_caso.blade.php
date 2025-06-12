<!DOCTYPE html>
<html>
<head>
    <title>Nuevo caso asignado</title>
</head>
<body>
    <h2>Hola, {{ $medico->nombre }}</h2>
    <p>Se te ha asignado un nuevo caso para revisión:</p>

    <p><strong>ID del caso:</strong> {{ $caso->id }}</p>
    <p><strong>Descripción:</strong> {{ $caso->descripcion }}</p>
    <p><strong>Fecha del incidente:</strong> {{ $caso->fecha_incidente }}</p>
    <p><strong>Ubicación:</strong> {{ $caso->ubicacion }}</p>

    <p>Por favor inicia sesión en el sistema para revisar el caso completo.</p>

    <p>Saludos,<br>
    El equipo de {{ config('app.name') }}</p>
</body>
</html>
