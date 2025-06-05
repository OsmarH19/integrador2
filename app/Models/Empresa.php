<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'Empresa';
    protected $fillable = [
        'nombre',
        'ruc',
        'direccion',
        'telefono',
        'email',
    ];

    /**
     * Relación con los usuarios (uno a muchos)
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'empresaID');
    }
}
