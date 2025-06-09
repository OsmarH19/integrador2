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
use Illuminate\Support\Facades\Http;

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
            $casos->lesionado_apellido_paterno = $request->lesionado_apellido_paterno;
            $casos->lesionado_apellido_materno = $request->lesionado_apellido_materno;
            $casos->lesionado_tipo_documento = $request->lesionado_tipo_documento;
            $casos->lesionado_numero_documento = $request->lesionado_numero_documento;
            $casos->poliza_id = $request->poliza_id;
            $casos->centro_medico_id = $request->centro_medico_id;
            $casos->created_by = Auth::user()->id;
            \Log::debug('Guardando caso...');
            $casos->save();
            \Log::debug('Caso guardado con ID: ' . $casos->id);

            // Guardar los datos en la tabla lesionados
            $lesionado = new Lesionados;
            \Log::debug('Guardando lesionado...');
            $lesionado->caso_id = $casos->id;
            $lesionado->nombres = $request->lesionado_nombres;
            $lesionado->apellido_paterno = $request->lesionado_apellido_paterno;
            $lesionado->apellido_materno = $request->lesionado_apellido_materno;
            $lesionado->tipo_documento = $request->lesionado_tipo_documento;
            $lesionado->numero_documento = $request->lesionado_numero_documento;
            $lesionado->save();
            \Log::debug('Lesionado guardado con ID: ' . $lesionado->id);
            // dd($lesionado);

            DB::commit();
            return back()->withInput()->with('success', 'Solicitud enviada correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error al guardar el caso: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al guardar el caso.');
        }
    }

    public function consultaDni(Request $request)
    {
        $dni = $request->dni;
        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI1ODEiLCJuYW1lIjoiQ29ycG9yYWNpb24gQUNNRSIsImVtYWlsIjoicmZsb3JlekBhY21ldGljLmNvbS5wZSIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvcm9sZSI6ImNvbnN1bHRvciJ9.06GySJlpTrqWUQA5EI3tDHvLn8LNzZ2m5VBSIy_SbF4';

        try {
            $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', "https://api.factiliza.com/v1/dni/info/$dni", [
                'headers' => [
                    'Authorization' => "Bearer $token",
                    'Accept' => 'application/json',
                ],
                // ACA SE SALTO LA VALIDACION SSL
                'verify' => false,
            ]);

            $data = json_decode($response->getBody(), true);

            if ($data['success']) {
                return response()->json([
                    'success' => true,
                    'nombres' => trim($data['data']['nombres']),
                    'apellido_paterno' => $data['data']['apellido_paterno'],
                    'apellido_materno' => $data['data']['apellido_materno'],
                ]);
            } else {
                return response()->json(['success' => false], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

}
