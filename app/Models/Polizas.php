<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Polizas extends Model
{
    protected $table = 'polizas';
    protected $primaryKey = 'id';
    public $fillable = [
        'numero_poliza',
        'aseguradora_id',
        'fecha_inicio',
        'fecha_fin',
        'tipo_cobertura',
        'created_at'
    ];
}
