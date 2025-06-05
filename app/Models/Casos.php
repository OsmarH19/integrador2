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
       'lesionado_nombres',
       'lesionado_apellidos',
       'lesionado_tipo_documento',
       'lesionado_numero_documento',
       'poliza_id',
       'centro_medico_id',
       'estado',
       'created_at',
    ];
}
