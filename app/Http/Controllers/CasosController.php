<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatPais;
use App\Models\CatDatosMaestro;
use App\Models\CatTipoMaestro;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Casos;
use App\Models\Lesionados;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\File;
use DB;

class CasosController extends Controller
{
    public function listadoCasos()
    {
        $casos = Casos::orderBy('created_at', 'desc')->get();
        return view('pages.casos.ListadoCasos', compact('casos'));
    }

    public function DatosFormulario()
    {
        $catpais = CatPais::all();
        $tipoidentificacion = CatDatosMaestro::where( 'TipoID', 1 )->get();
        $ocupacion = CatDatosMaestro::where( 'TipoID', 2 )->get();
        $tipoente = CatDatosMaestro::where( 'TipoID', 3 )->get();
        $lugaremision = CatDatosMaestro::where( 'TipoID', 4 )->get();
        $tratamiento = CatDatosMaestro::where( 'TipoID', 5 )->get();
        $jurisdiccion = CatDatosMaestro::where( 'TipoID', 6 )->get();
        $clasificacion = CatDatosMaestro::where( 'TipoID', 7 )->get();
        $titulocontacto = CatDatosMaestro::where( 'TipoID', 8 )->get();
        $tipodireccion = CatDatosMaestro::where( 'TipoID', 18 )->get();
        $tipocontacto = CatDatosMaestro::where( 'TipoID', 19 )->get();

        return view( 'pages.casos.NewCaso', compact( 'catpais','tipocontacto' , 'tipodireccion', 'tipoidentificacion', 'ocupacion', 'tipoente', 'lugaremision', 'tratamiento', 'jurisdiccion', 'clasificacion', 'titulocontacto' ) );
    }
}
