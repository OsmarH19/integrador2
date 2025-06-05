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
}
