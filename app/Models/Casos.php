<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
       'updated_at ',
        //Guardar tambien en el modelo Lesionados
       'lesionado_nombres',
       'lesionado_apellido_paterno',
       'lesionado_apellido_materno',
       'lesionado_tipo_documento',
       'lesionado_numero_documento',
       //Select modelo Polizas
       //Guardar tambien en el modelo Polizas
       'poliza_id',
       //Select modelo CentrosMedicos
       'centro_medico_id',
    ];

    // En el modelo Casos.php
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
}
