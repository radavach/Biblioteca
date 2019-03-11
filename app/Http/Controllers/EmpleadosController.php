<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

//La solucion
use App\Empleado;

use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    //
    public function index()
    {
        $empleados = DB::table('empleados')
        // //     // ->where('id', '!=', 1)
        // //     // ->where('dirigido', '!=', '')
            ->get();
        // db($empleados)
        // return 'EMPLEADO INDEX';

        // MODELO
        // $empleados = Empleado::all();

        return view('empleados.empleadoIndex', compact('empleados'));
    }
}
