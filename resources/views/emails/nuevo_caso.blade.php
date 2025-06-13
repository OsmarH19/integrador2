<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Nuevo caso asignado</title>
    <style type="text/css">

        body {
            margin: 0;
            padding: 0;
            min-width: 100%;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            background-color: #f6f6f6;
            color: #333333;
        }

        table {
            border-spacing: 0;
            font-family: Arial, sans-serif;
            background: #ffffff;
        }
    </style>
</head>
<body style="margin: 0; padding: 0; min-width: 100%; font-family: Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; background-color: #f6f6f6;">
        <tr>
            <td style="padding: 20px;">
                <table width="100%" max-width="600" cellpadding="0" cellspacing="0" style="margin: 0 auto; background-color: #ffffff; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h2 style="color: #2c3e50; margin: 0 0 20px;">Hola, {{ $medico->nombre }}</h2>
                            <p style="margin: 0 0 20px;">Se te ha asignado un nuevo caso para revisión:</p>

                            <table width="100%" cellpadding="0" cellspacing="0" style="margin: 0 0 20px;">
                                <tr>
                                    <td style="padding: 10px; background-color: #f8f9fa; border-radius: 4px;">
                                        <p style="margin: 0 0 10px;"><strong style="color: #2c3e50;">ID del caso:</strong> {{ $caso->id }}</p>
                                        <p style="margin: 0 0 10px;"><strong style="color: #2c3e50;">Descripción:</strong> {{ $caso->descripcion }}</p>
                                        <p style="margin: 0 0 10px;"><strong style="color: #2c3e50;">Fecha del incidente:</strong> {{ $caso->fecha_incidente }}</p>
                                        <p style="margin: 0;"><strong style="color: #2c3e50;">Ubicación:</strong> {{ $caso->ubicacion }}</p>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 0 0 20px;">Por favor inicia sesión en el sistema para revisar el caso completo.</p>

                            <p style="margin: 0; padding-top: 20px; border-top: 1px solid #eee;">
                                Saludos,<br>
                                <span style="color: #2c3e50;">El equipo de {{ config('app.name') }}</span>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
