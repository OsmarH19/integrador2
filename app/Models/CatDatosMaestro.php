<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CatDatosMaestro extends Model
{
    protected $table = 'CAT_DatosMaestro';
    protected $primaryKey = 'MaeestroID';
    public $fillable = [
        'TipoID'
        ,'codigo'
        ,'nombre'
        ,'PadreID'
        ,'estado'
        ,'created_at'
        ,'created_by'
        ,'updated_at'
        ,'updated_by'
    ];

    public function usuarios()
    {
        return $this->hasMany(User::class, 'rolID', 'MaeestroID');
    }

}
