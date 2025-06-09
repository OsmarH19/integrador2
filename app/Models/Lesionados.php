<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesionados extends Model
{
    public $timestamps = false;
    protected $table = 'lesionados';
    protected $primaryKey = 'id';
    public $fillable = [
        'caso_id',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'tipo_documento',
        'numero_documento',
        'created_at',
        'updated_at',
        // 'edad',
        // 'sexo',
    ];

    public function caso()
    {
        return $this->belongsTo(Casos::class, 'caso_id');
    }

}
