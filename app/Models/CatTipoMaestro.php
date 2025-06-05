<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatTipoMaestro extends Model
{
    protected $table = 'CAT_TipoMaestro';
    protected $primaryKey = 'TipoID';
    public $fillable = [
        'NombreTipo'
        ,'Descripcion'
        ,'estado'
        ,'created_at'
        ,'created_by'
        ,'updated_at'
        ,'updated_by'
    ];

    public function getEstadoTextoAttribute()
    {
        return $this->estado === 0 ? 'Activo' : 'Inactivo';
    }

    public function getEstadoClaseAttribute()
    {
        return $this->estado === 0 ? 'bg-success' : 'bg-error';
    }
}
