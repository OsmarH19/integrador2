<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OPS_EntityAddress extends Model
{
    protected $table = 'OPS_EntityAddress';
    protected $primaryKey = 'adressID';
    public $fillable = [
        'enteID'
        ,'tipoDireccionID'
        ,'direccion'
        ,'latlong'
        ,'paisID'
        ,'estadoID'
        ,'ciudadID'
        ,'telefono'
        ,'email'
        ,'fax'
        ,'created_at'
        ,'created_by'
        ,'update_at'
        ,'updated_by'
        ,'status'
    ];
}
