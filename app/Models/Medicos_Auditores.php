<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicos_Auditores extends Model
{
    public $timestamps = false;
    protected $table = 'medicos_auditores';
    protected $primaryKey = 'id';
    public $fillable = [
        'nombre',
        'email',
        'created_at',
    ];
}
