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
    public function create()
    {
        // return view('empleados.');
    }
    public function edit()
    {
        // poner rutas
    }
    public function show()
    {
        // poner rutas
    }
    public function update()
    {
        // poner rutas
        $dependencia->dependencia = $request->input('dependencia');
        $dependencia->clave = $request->clave;
        $dependencia->save();
        return redirect()->route('dependencias.show', $dependencia->id);
    }
    public function delete()
    {
        // poner rutas
    }
    public function store()
    {

    }
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index');
    }
}
