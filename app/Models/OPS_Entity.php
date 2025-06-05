<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OPS_Entity extends Model
{
    protected $table = 'OPS_Entity';
    protected $primaryKey = 'enteID';
    public $fillable = [
        'tipoIdentificacionID'
        ,'nroIdentificacion'
        ,'fechaEmisionIdent'
        ,'fechaVencimientoIdent'
        ,'lugarIdentID'
        ,'nombre'
        ,'apellido'
        ,'fechaNacimiento'
        ,'lugarNacimiento'
        ,'tipoEnteID'
        ,'paisID'
        ,'ocupacionID'
        ,'actividadID'
        ,'antecedentes'
        ,'motivoIniciacion'
        ,'jurisdiccionID'
        ,'encargadoCumplimientoID'
        ,'encargadoCorporativoID'
        ,'clasificacionID'
        ,'actividadReguladaID'
        ,'estadoDD'
        ,'descripcion'
        ,'cotizaBolsaYN'
        ,'descripcionBolsa'
        ,'negocioGobiernoYN'
        ,'descripcionGobierno'
        ,'created_at'
        ,'created_by'
        ,'updated_at'
        ,'updated_by'
        ,'status'
    ];

    public function pais()
    {
        return $this->belongsTo(CatPais::class, 'paisID', 'PaisID');
    }

    public function tipoIdentificacion()
    {
        return $this->belongsTo(CatDatosMaestro::class, 'tipoIdentificacionID', 'MaeestroID');
    }

    public function tipoEnte()
    {
        return $this->belongsTo(CatDatosMaestro::class, 'tipoEnteID', 'MaeestroID');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function direccion()
{
    return $this->hasOne(OPS_EntityAddress::class, 'enteID', 'enteID')->latest(); // opcionalmente latest() si quieres la más reciente
}

}
