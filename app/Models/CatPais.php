<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatPais extends Model
{
    protected $table = 'CAT_Pais';
    protected $primaryKey = 'PaisID';
    public $fillable = [
        'Prefijo'
        ,'Nombre'
        ,'CodigoTelefono'
        ,'CodigoBandera'
    ];
}
