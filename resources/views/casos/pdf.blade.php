<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Caso #{{ $caso->id }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 13px;
            color: #2c3e50;
            margin: 40px;
            background: #fff;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px solid #1a5276;
            padding-bottom: 15px;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
            color: #1a5276;
            letter-spacing: 1px;
        }

        .subtitle {
            font-size: 14px;
            color: #7f8c8d;
            margin-top: 4px;
        }

        .section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #dcdcdc;
            border-radius: 6px;
            background-color: #fafafa;
        }

        .section-title {
            font-size: 15px;
            font-weight: bold;
            color: #1a5276;
            margin-bottom: 12px;
            padding-bottom: 6px;
            border-bottom: 2px solid #1a5276;
        }

        .row {
            display: flex;
            margin-bottom: 8px;
        }

        .label {
            width: 200px;
            font-weight: 600;
            color: #2c3e50;
        }

        .value {
            flex: 1;
            color: #34495e;
        }

        .footer {
            margin-top: 50px;
            font-size: 11px;
            text-align: right;
            color: #7f8c8d;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }

        @media print {
            body {
                margin: 20mm;
            }

            .section {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">REPORTE DE CASO</div>
        <div class="subtitle">Código: #{{ str_pad($caso->id, 6, '0', STR_PAD_LEFT) }}</div>
    </div>

    <div class="section">
        <div class="section-title">INFORMACIÓN GENERAL</div>
        <div class="row"><div class="label">Fecha del Incidente:</div><div class="value">{{ \Carbon\Carbon::parse($caso->fecha_incidente)->format('d/m/Y') }}</div></div>
        <div class="row"><div class="label">Ubicación:</div><div class="value">{{ $caso->ubicacion }}</div></div>
        <div class="row"><div class="label">Compañía:</div><div class="value">{{ $caso->compania->nombre ?? 'No especificado' }}</div></div>
        <div class="row"><div class="label">Servicio:</div><div class="value">{{ $caso->servicio->nombre ?? 'No especificado' }}</div></div>
        <div class="row"><div class="label">Póliza:</div><div class="value">{{ $caso->poliza->numero_poliza ?? 'No especificado' }}</div></div>
        <div class="row"><div class="label">Centro Médico:</div><div class="value">{{ $caso->centroMedico->nombre ?? 'No especificado' }}</div></div>
        <div class="row"><div class="label">Descripción:</div><div class="value">{{ $caso->descripcion }}</div></div>
    </div>

    <div class="section">
        <div class="section-title">DATOS DEL LESIONADO</div>
        <div class="row"><div class="label">Nombres:</div><div class="value">{{ $caso->lesionado_nombres }}</div></div>
        <div class="row"><div class="label">Apellidos:</div><div class="value">{{ $caso->lesionado_apellido_paterno }} {{ $caso->lesionado_apellido_materno }}</div></div>
        <div class="row"><div class="label">Tipo de Documento:</div><div class="value">{{ $caso->tipoDocumento->nombre ?? 'No especificado' }}</div></div>
        <div class="row"><div class="label">Número de Documento:</div><div class="value">{{ $caso->lesionado_numero_documento }}</div></div>
    </div>

    @if($caso->Placa)
    <div class="section">
        <div class="section-title">DATOS DEL VEHÍCULO</div>
        <div class="row"><div class="label">Placa:</div><div class="value">{{ $caso->Placa }}</div></div>
        <div class="row"><div class="label">Fecha Inicio SOAT:</div><div class="value">{{ $caso->FechaInicio ? \Carbon\Carbon::parse($caso->FechaInicio)->format('d/m/Y') : 'No especificado' }}</div></div>
        <div class="row"><div class="label">Fecha Fin SOAT:</div><div class="value">{{ $caso->FechaFin ? \Carbon\Carbon::parse($caso->FechaFin)->format('d/m/Y') : 'No especificado' }}</div></div>
        <div class="row"><div class="label">Estado:</div><div class="value">{{ $caso->EstadoPlaca ?? 'No especificado' }}</div></div>
        <div class="row"><div class="label">Clase de Vehículo:</div><div class="value">{{ $caso->NombreClaseVehiculo ?? 'No especificado' }}</div></div>
        <div class="row"><div class="label">Tipo de Certificado:</div><div class="value">{{ $caso->TipoCertificado ?? 'No especificado' }}</div></div>
        <div class="row"><div class="label">Número de Aseguradora:</div><div class="value">{{ $caso->NumeroAseguradora ?? 'No especificado' }}</div></div>
    </div>
    @endif

    <div class="footer">
        Generado el: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}<br>
        Por: {{ Auth::user()->name }}
    </div>
</body>
</html>
