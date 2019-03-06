<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    //
    public function index()
    {
        $empleados = DB::table('empleados')
        //     // ->where('id', '!=', 1)
        //     // ->where('dirigido', '!=', '')
            ->get();
        // db($empleados)
        // return 'EMPLEADO INDEX';

        // MODELO
        // $empleados = empleados::all();

        return view('empleados.empleadoIndex', compact('empleados'));
    }
}
