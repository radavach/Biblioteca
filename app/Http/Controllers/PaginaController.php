<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function info()
    {
        return view('paginas.info');
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
