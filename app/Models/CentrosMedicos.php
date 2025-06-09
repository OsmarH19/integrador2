<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentrosMedicos extends Model
{
    protected $table = 'centros_medicos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'created_at'
    ];
}
