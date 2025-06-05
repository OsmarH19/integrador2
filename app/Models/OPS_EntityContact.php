<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OPS_EntityContact extends Model
{
    protected $table = 'OPS_EntityContact';
    protected $primaryKey = 'contactID';
    public $fillable = [
        'enteID'
        ,'tipoContactoID'
        ,'tituloID'
        ,'nombreContacto'
        ,'apellidoContacto'
        ,'email'
        ,'telefono'
        ,'created_at'
        ,'created_by'
        ,'update_at'
        ,'updated_by'
        ,'status'
    ];
}
