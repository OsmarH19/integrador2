<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesionados extends Model
{
    protected $table = 'lesionados';
    protected $primaryKey = 'id';
    public $fillable = [
        'caso_id',
        'nombres',
        'apellidos',
        'tipo_documento',
        'numero_documento',
        'edad',
        'genero',
        'descripcion_lesion',
        'created_at',
    ];
}
