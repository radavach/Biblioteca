<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

if(!isset($_SESSION)) session_start(); 

class PaginaController extends Controller
{
    public function info(Request $request)
    {
        $parametro = $request->buscar;
        if(\Auth::user() !== null and Gate::denies('permisos_admin')){ $_SESSION['biblioteca'] = \Auth::user()->biblioteca_id;}
        return view('paginas.info', compact('parametro'));
    }
    public function contacto()
    {
        return view('paginas.contacto');
    }
    public function bienvenida($nombre, $apellido = null)
    {
        return view('Paginas.bienvenida', compact('nombre', 'apellido'))
        ->with(['nombre_completo'=> $nombre.' '.$apellido]);
    }
    public function colaboradores(){
        return view('paginas.colaboradores');
    }

}
