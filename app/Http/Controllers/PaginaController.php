<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function info()
    {
        return view('Paginas.info');
    }
    public function contacto()
    {
        return view('Paginas.contacto');
    }
    public function bienvenida()
    {

    }
    public function Colaboradores(){
        return view('Paginas.Colaboradores');
    }

}
