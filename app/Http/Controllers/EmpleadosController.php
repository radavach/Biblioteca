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
        return view('empleados.empleadoForm');

    }
    public function edit(Empleado $empleado)
    {
        // poner rutas
        return view('empleados.empleadoForm', compact('empleado'));
    }
    public function show(Empleado $empleado)
    {
        // poner rutas
        return view('empleados.empleadoShow', compact('empleado'));
    }
    public function update(Request $request, Empleado $empleado)
    {
        // poner rutas
        // $empleado->nombre = $request->input('nombre');
        $empleado->nombre = $request->nombre;
        $empleado->apellidoPaterno = $request->apellidoPaterno;
        $empleado->apellidoMaterno = $request->apellidoMaterno;
        $empleado->contrasena = $request->contrasena;
        $empleado->telefono = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->rfc = $request->rfc;
        $empleado->correoElectronico = $request->correoElectronico;

        $empleado->save();
       //Nuevo $empleado->update($request->except('funcionarios_id'));
       //Nuevo $empleado->funcionarios()->sync($request->funcionarios_id);

       return redirect()->route('empleados.show', $empleado->id);
       // Nuevo return redirect()->route('empleados.index');
    }
    public function delete()
    {
        // poner rutas
    }
    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'empleado' => 'required|max:255',
        //         'clave' => 'required|min:3|max10',
        //     ]
        // );

        $request->merge();
        Empleado::create($request->all());

        // $emp = new Empleado();
        // $emp->empleado = $request->input('empleado'); 
        // $dep->clave = $request->clave;
        // $dep->save();

        

        return redirect()->route('empleado.index');

    }
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index');
    }
}
