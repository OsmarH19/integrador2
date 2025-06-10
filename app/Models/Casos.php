<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Casos extends Model
{
    protected $table = 'casos';
    protected $primaryKey = 'id';
    public $fillable = [
       'descripcion',
       'fecha_incidente',
       'ubicacion',
       'compania_id',
       'servicio_id',
       'estado',
       'created_at',
       'created_by',
       'updated_at',
       'lesionado_nombres',
       'lesionado_apellido_paterno',
       'lesionado_apellido_materno',
       'lesionado_tipo_documento',
       'lesionado_numero_documento',
       'poliza_id',
       'centro_medico_id',
       'Placa',
       'FechaInicio',
       'FechaFin',
       'EstadoPlaca',
       'NombreClaseVehiculo',
       'TipoCertificado',
       'NumeroAseguradora',
       'pdf_path',
    ];

    public function compania()
    {
        return $this->belongsTo(CatDatosMaestro::class, 'compania_id');
    }

    public function servicio()
    {
        return $this->belongsTo(CatDatosMaestro::class, 'servicio_id');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(CatDatosMaestro::class, 'lesionado_tipo_documento');
    }

    public function poliza()
    {
        return $this->belongsTo(Polizas::class, 'poliza_id');
    }

    public function centroMedico()
    {
        return $this->belongsTo(CentrosMedicos::class, 'centro_medico_id');
    }

    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lesionado()
    {
        return $this->hasOne(Lesionados::class, 'caso_id');
    }

}
