<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aseguradoras extends Model
{
    protected $table = 'aseguradoras';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'created_at'
    ];
}
