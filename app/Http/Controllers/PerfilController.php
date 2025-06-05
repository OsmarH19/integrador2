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

class PerfilController extends Controller
{
    // PERFIL
    public function formsLayoutV5() {
        $user = auth()->user();
        return view( 'pages.perfil.perfil', compact( 'user' ) );
    }
    // Actualizar perfil del usuario
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'photo' => 'nullable|image',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = 'usuario' . $user->id . '.' . $extension;
            $path = public_path('images/avatar');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            try {
                $file->move($path, $filename);
                $user->photo = 'images/avatar/' . $filename;
            } catch (\Exception $e) {
                return back()->with('error', 'Error subiendo imagen: ' . $e->getMessage());
            }
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado correctamente.');
    }

    public function formsEmpresa()
    {
        $empresas = Empresa::with('users')->get();
        return view('pages.perfil', compact('empresas'));
    }
}
