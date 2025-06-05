<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatPais;
use App\Models\CatDatosMaestro;
use App\Models\CatTipoMaestro;
use App\Models\Empresa;
use App\Models\User;
use App\Models\OPS_Entity;
use App\Models\OPS_EntityAddress;
use App\Models\OPS_EntityContact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\File;
use DB;

class MantenimientoController extends Controller {
    // MANTENIMIENTO CATÁLOGO

    public function appsMantenimiento() {
        $catmaestro = CatTipoMaestro::all();
        return view( 'pages/mantenimiento/apps-mantenimiento', compact( 'catmaestro' ) );
    }

    // DESACTIVAR CATÁLOGO

    public function desactivarItem( $id ) {
        $item = CatTipoMaestro::findOrFail( $id );
        $item->estado = 1;
        // Cambiar estado a inactivo
        $item->save();

        return response()->json( [ 'success' => true, 'message' => 'Estado actualizado correctamente' ] );
    }

    // ACTIVAR CATÁLOGO

    public function activarItem( $id ) {
        $item = CatTipoMaestro::findOrFail( $id );
        $item->estado = 0;
        $item->save();

        return response()->json( [ 'success' => true, 'message' => 'Estado actualizado correctamente' ] );
    }

    // ACTUALIZAR CATÁLOGO

    public function actualizarItem( Request $request, $id ) {
        $request->validate( [
            'NombreTipo' => 'required|string|max:255',
            'Descripcion' => 'required|string|max:500',
        ] );

        $item = CatTipoMaestro::findOrFail( $id );
        $item->NombreTipo = $request->NombreTipo;
        $item->Descripcion = $request->Descripcion;
        $item->created_by = Auth::id();
        $item->updated_by = Auth::id();
        $item->created_at = now();
        $item->updated_at = now();
        $item->save();

        return response()->json( [ 'success' => true, 'message' => 'Registro actualizado correctamente' ] );
    }

    public function crearNuevo( Request $request ) {
        $request->validate( [
            'NombreTipo' => 'required|string|max:255',
            'Descripcion' => 'required|string|max:500',
        ] );

        $item = new CatTipoMaestro();
        $item->NombreTipo = $request->NombreTipo;
        $item->Descripcion = $request->Descripcion;
        $item->created_by = Auth::id();
        $item->updated_by = Auth::id();
        $item->created_at = now();
        $item->updated_at = now();
        $item->estado = 0;
        $item->save();

        return response()->json( [ 'success' => true, 'message' => 'Catálogo creado correctamente' ] );
    }

    public function mostrarDatosCatalogo( $tipoId ) {
        $datos = CatDatosMaestro::where( 'TipoID', $tipoId )->get();
        $tipoCatalogo = CatTipoMaestro::find( $tipoId );

        return view( 'pages/mantenimiento/apps-mantenimiento-datoscatalogo', [
            'datos' => $datos,
            'tipoCatalogo' => $tipoCatalogo
        ] );
    }

    public function crearNuevoSubcatalogo( Request $request ) {
        $request->validate( [
            'nombre' => 'required|string|max:255',
            'tipoId' => 'required',
        ] );

        $ultimo = CatDatosMaestro::where( 'TipoID', $request->tipoId )->max( 'codigo' );
        $nuevoCodigo = $ultimo ? $ultimo + 1 : 1;

        $item = new CatDatosMaestro();
        $item->nombre = $request->nombre;
        $item->TipoID = $request->tipoId;
        $item->codigo = $nuevoCodigo;
        $item->created_by = Auth::id();
        $item->updated_by = Auth::id();
        $item->created_at = now();
        $item->updated_at = now();
        $item->estado = 0;
        $item->save();

        return response()->json( [ 'success' => true, 'message' => 'Catálogo creado correctamente' ] );
    }

    // DESACTIVAR SUB CATÁLOGO

    public function desactivarSubItem( $MaeestroID ) {
        $item = CatDatosMaestro::findOrFail( $MaeestroID );
        $item->estado = 1;
        $item->save();

        return response()->json( [ 'success' => true, 'message' => 'Estado actualizado correctamente' ] );
    }

    // ACTIVAR SUB CATÁLOGO

    public function activarSubItem( $MaeestroID ) {
        $item = CatDatosMaestro::findOrFail( $MaeestroID );
        $item->estado = 0;
        $item->save();

        return response()->json( [ 'success' => true, 'message' => 'Estado actualizado correctamente' ] );
    }

    // MANTENIMIENTO EMPRESAS

    public function appsEmpresa() {
        $catempresa = Empresa::all();
        return view( 'pages/mantenimiento/apps-empresa', compact( 'catempresa' ) );
    }

    public function crearEmpresa( Request $request ) {
        if ( !$request->hasFile( 'photo' ) ) {
            return response()->json( [ 'success' => false, 'message' => 'No se recibió la imagen' ] );
        }

        $request->validate( [
            'nombre' => 'required|string|max:255',
            'ruc' => 'required|string|max:500',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ] );

        $item = new Empresa();
        $item->nombre = $request->nombre;
        $item->ruc = $request->ruc;
        $item->direccion = $request->direccion;
        $item->telefono = $request->telefono;
        $item->estado = 0;
        $item->created_at = now();
        $item->updated_at = now();

        if ( $request->hasFile( 'photo' ) ) {
            $file = $request->file( 'photo' );
            $extension = $file->getClientOriginalExtension();

            $cleanName = preg_replace( '/[^A-Za-z0-9_\-]/', '_', $request->nombre );
            $filename = $cleanName . '.' . $extension;

            $path = public_path( 'images/empresa' );

            if ( !file_exists( $path ) ) {
                mkdir( $path, 0777, true );
            }

            try {
                $file->move( $path, $filename );
                $item->photo = 'images/empresa/' . $filename;
            } catch ( \Exception $e ) {
                return response()->json( [ 'success' => false, 'message' => 'Error al subir la imagen: ' . $e->getMessage() ] );
            }
        }

        $item->save();
        // dd( $item->save() );
        return response()->json( [ 'success' => true, 'message' => 'Empresa creada correctamente' ] );
    }

    // ACTUALIZAR EMPRESA

    public function actualizarEmpresa( Request $request, $id ) {
        $request->validate( [
            'nombre' => 'required|string|max:255',
            'ruc' => 'required|string|max:500',
        ] );

        $item = Empresa::findOrFail( $id );
        $item->nombre = $request->nombre;
        $item->ruc = $request->ruc;
        $item->direccion = $request->direccion;
        $item->telefono = $request->telefono;
        // $item->email = $request->email;
        // $item->photo = $request->photo;
        // $item->created_by = Auth::id();
        // $item->updated_by = Auth::id();
        $item->created_at = now();
        $item->updated_at = now();
        $item->save();

        return response()->json( [ 'success' => true, 'message' => 'Registro actualizado correctamente' ] );
    }

    // DESACTIVAR EMPRESA

    public function desactivarEmpresa( $id ) {
        $item = Empresa::findOrFail( $id );
        $item-> estado = 1;
        $item->save();

        return response()->json( [ 'success' => true, 'message' => 'Estado actualizado correctamente' ] );
    }

    // ACTIVAR EMPRESA

    public function activarEmpresa( $id ) {
        $item = Empresa::findOrFail( $id );
        $item-> estado = 0;
        $item->save();

        return response()->json( [ 'success' => true, 'message' => 'Estado actualizado correctamente' ] );
    }
    //
}
