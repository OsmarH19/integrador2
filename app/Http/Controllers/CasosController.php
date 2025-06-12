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
use App\Models\Medicos_Auditores;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\File;
use DB;
use Illuminate\Support\Facades\Http;
use PDF;

class CasosController extends Controller
{
    public function listadoCasos()
    {
        $tipoidentificacion = CatDatosMaestro::where( 'TipoID', 1 )->get();
        $compañia = CatDatosMaestro::where( 'TipoID', 4 )->get();
        $servicio = CatDatosMaestro::where( 'TipoID', 5 )->get();
        $casos = Casos::orderBy('id', 'ASC')->get();
        return view('pages.casos.ListadoCasos', compact('casos','compañia' , 'servicio', 'tipoidentificacion'));
    }

    public function DatosFormulario()
    {
        $tipoidentificacion = CatDatosMaestro::where( 'TipoID', 1 )->get();
        $compañia = CatDatosMaestro::where( 'TipoID', 4 )->get();
        $servicio = CatDatosMaestro::where( 'TipoID', 5 )->get();
        $medicosAuditores = Medicos_Auditores::all();

        return view( 'pages.casos.NewCasos', compact( 'compañia' , 'servicio', 'tipoidentificacion', 'medicosAuditores' ) );
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
            $casos->medico_auditorID = $request->medico_auditorID;

            if ($request->has('Placa') && $request->Placa) {
                $casos->Placa = $request->Placa;

                if ($request->FechaInicio) {
                    $casos->FechaInicio = Carbon::createFromFormat('d/m/Y', $request->FechaInicio)->format('Y-m-d');
                }

                if ($request->FechaFin) {
                    $casos->FechaFin = Carbon::createFromFormat('d/m/Y', $request->FechaFin)->format('Y-m-d');
                }

                $casos->EstadoPlaca = $request->EstadoPlaca;
                $casos->NombreClaseVehiculo = $request->NombreClaseVehiculo;
                $casos->TipoCertificado = $request->TipoCertificado;
                $casos->NumeroAseguradora = $request->NumeroAseguradora;
            }

            $casos->created_by = Auth::user()->id;
            $casos->save();

            // Guardar los datos en la tabla lesionados
            $lesionado = new Lesionados;
            $lesionado->caso_id = $casos->id;
            $lesionado->nombres = $request->lesionado_nombres;
            $lesionado->apellido_paterno = $request->lesionado_apellido_paterno;
            $lesionado->apellido_materno = $request->lesionado_apellido_materno;
            $lesionado->tipo_documento = $request->lesionado_tipo_documento;
            $lesionado->numero_documento = $request->lesionado_numero_documento;
            $lesionado->save();

            // Generar el PDF
            $casoCompleto = Casos::with(['compania', 'servicio', 'poliza', 'centroMedico', 'tipoDocumento'])->find($casos->id);

            $pdf = PDF::loadView('casos.pdf', [
                'caso' => $casoCompleto
            ]);

            // Guardar el PDF en storage
            $filename = 'caso_' . str_pad($casos->id, 6, '0', STR_PAD_LEFT) . '.pdf';
            $pdfPath = 'pdfs/casos/' . $filename;
            \Storage::disk('public')->put($pdfPath, $pdf->output());


            // Actualizar el caso con la ruta del PDF
            $casos->pdf_path = $pdfPath;
            $casos->save();

            DB::commit();

            return redirect()->route('casos.listado')
                ->with('success', 'Caso creado correctamente')
                ->with('pdf_url', route('casos.download', $casos->id));

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error al guardar el caso: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Ocurrió un error al guardar el caso.');
        }
    }

    public function downloadPdf($id)
    {
        $caso = Casos::findOrFail($id);
        $pdfPath = 'storage/app/pdfs/casos/' . basename($caso->pdf_path);

        if (!file_exists($pdfPath)) {
            abort(404);
        }

        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($caso->pdf_path) . '"'
        ];

        return response()->file($pdfPath, $headers);
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

    public function consultaPlaca(Request $request)
    {
        $placa = $request->Placa;
        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.MTQ5Ng.SLSuO2UYeZI0KsDGTSoz-yNGPN9HbHxha4T2FPglIFY';

        try {
            $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', "https://quertium.com/api/v1/apeseg/soat/$placa", [
                'headers' => [
                    'Authorization' => "Bearer $token",
                    'Accept' => 'application/json',
                ],
                'verify' => false,
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['Placa'], $data['FechaInicio'], $data['FechaFin'])) {
                return response()->json([
                    'success' => true,
                    'Placa' => trim($data['Placa']),
                    'FechaInicio' => $data['FechaInicio'],
                    'FechaFin' => $data['FechaFin'],
                    'Estado' => $data['Estado'],
                    'NombreClaseVehiculo' => $data['NombreClaseVehiculo'],
                    'TipoCertificado' => $data['TipoCertificado'],
                    'NumeroAseguradora' => $data['NumeroAseguradora'],
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Datos incompletos o placa no válida.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }


}
