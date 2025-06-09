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
use App\Models\Aseguradoras;
use App\Models\CentrosMedicos;
use App\Models\Polizas;
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
        $compañia = CatDatosMaestro::where( 'TipoID', 4 )->get();
        $servicio = CatDatosMaestro::where( 'TipoID', 5 )->get();

        return view( 'pages.casos.NewCasos', compact( 'catpais','compañia' , 'servicio', 'tipoidentificacion' ) );
    }

    public function NewCasos(Request $request)
{
    DB::beginTransaction();

    try {
        \Log::debug('Datos recibidos:', $request->all());

        $casos = new Casos;
        $casos->estado = 0;
        $casos->descripcion = $request->descripcion;
        $casos->fecha_incidente = $request->fecha_incidente;
        $casos->ubicacion = $request->ubicacion;
        $casos->compania_id = $request->compania_id;
        $casos->servicio_id = $request->servicio_id;
        $casos->lesionado_nombres = $request->lesionado_nombres;
        $casos->lesionado_apellidos = $request->lesionado_apellidos;
        $casos->lesionado_tipo_documento = $request->lesionado_tipo_documento;
        $casos->lesionado_numero_documento = $request->lesionado_numero_documento;
        $casos->poliza_id = $request->poliza_id;
        $casos->centro_medico_id = $request->centro_medico_id;
        $casos->save();

        DB::commit();
        return back()->withInput()->with('success', 'Solicitud enviada correctamente');
    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Error al guardar el caso: ' . $e->getMessage());
        return back()->withInput()->with('error', 'Ocurrió un error al guardar el caso.');
    }
}




}
