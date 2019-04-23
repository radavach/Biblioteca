<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

//La solucion
use App\Empleado;
use App\Biblioteca;
use App\Persona;

use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    //
    public function index()
    {
        // $empleados = DB::table('empleados')
        // // //     // ->where('id', '!=', 1)
        // // //     // ->where('dirigido', '!=', '')
        //     ->get();
        // // db($empleados)
        // // return 'EMPLEADO INDEX';

        // // MODELO
        $empleados = Empleado::all();

        return view('empleados.empleadoIndex', compact('empleados'));
    }
    public function create()
    {
        // return view('empleados.');
        $bibliotecas = Biblioteca::all();
        $personas = Persona::all();

        return view('empleados.empleadoForm', compact('personas', 'bibliotecas'));

    }
    public function edit(Empleado $empleado)
    {
        // poner rutas
        $bibliotecas = Biblioteca::all();
        $persona = $empleado->persona;
        $personas = Persona::all();
        return view('empleados.empleadoForm', compact('personas', 'empleado', 'bibliotecas', 'persona'));
    }
    public function show(Empleado $empleado)
    {
        // poner rutas
        $persona = $empleado->persona;
        return view('empleados.empleadoShow', compact('empleado', 'persona'));
    }
    public function update(Request $request, Empleado $empleado)
    {
        // poner rutas
        // $empleado->nombre = $request->input('nombre');

<<<<<<< HEAD
        $empleado->save();
       //Nuevo $empleado->update($request->except('funcionarios_id'));
       //Nuevo $empleado->funcionarios()->sync($request->funcionarios_id);
=======
        // $empleado->nombre = $request->nombre;
        // $empleado->apellidoPaterno = $request->apellidoPaterno;
        // $empleado->apellidoMaterno = $request->apellidoMaterno;
        // $empleado->contrasena = $request->contrasena;
        // $empleado->telefono = $request->telefono;
        // $empleado->direccion = $request->direccion;
        // $empleado->rfc = $request->rfc;
        // $empleado->correoElectronico = $request->correoElectronico;

        // $empleado->save();

        $request->validate([
            'nombre' => 'required|min:3',
            'apellidoPaterno' => 'required|min:3',
            'apellidoMaterno' => 'nullable|min:3',
            'nombreUsuario' => 'required|min:3',
            'email' => 'required|min:3',
            'rfc' => 'required|min:13',
            'biblioteca_id' => 'required',
            'empleado_id' => 'required',
        ]);

        $empleado->update([
            'persona_id' => $request->empleado_id,
            'idEmpleado' => $request->empleado_id,
        ]);

        $empleado->persona()->update($request->except('rfc', 'contrasena', 'esAdmin', 'empleado_id'));

        $esAdmin = $request->esAdmin === "TRUE" ? true : false;

        $empleado->update([
            'rfc' => $request->rfc,
            'contrasena' => $request->contrasena,
            'esAdmin' => $esAdmin,
        ]);

>>>>>>> uptream/master

       return redirect()->route('empleados.show', $empleado->id);
       // Nuevo return redirect()->route('empleados.index');
    }
    public function delete()
    {
        // poner rutas
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3',
            'apellidoPaterno' => 'required|min:3',
            'apellidoMaterno' => 'nullable|min:3',
            'nombreUsuario' => 'required|min:3',
            'email' => 'required|min:3',
            'rfc' => 'required|min:13',
            'biblioteca_id' => 'required',
            'empleado_id' => 'required',
            'esAdmin' => 'required',
        ]);
        
        $esAdmin = $request->esAdmin === "TRUE" ? true : false;

        $empleado = Empleado::create([
            'rfc' => $request->rfc,
            'contrasena' => $request->contrasena,
            'esAdmin' => $esAdmin,
            'persona_id' => $persona->id,
            'idEmpleado' => $persona->id,
        ]);
        
        $empleado->persona()->update($request->except('rfc', 'contrasena', 'esAdmin', 'empleado_id'));

        return redirect()->route('empleados.index');
    }
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')
            ->with([
                'mensaje' => 'Cliente Eliminado',
                'alert-class' => 'alert-warning',
            ]);
    }
    public function redireccionarEmp(Request $request, Empleado $empleado)
    {
        $bibliotecas = Biblioteca::all();
        $personas = Persona::all();
        $persona = DB::table('personas')
            ->where('id',  $request->persona_id)
            ->first();
    
        return view('empleados.empleadoForm', compact('personas', 'empleado', 'bibliotecas', 'persona'));
    }
    public function redireccionar(Request $request)
    {
        $bibliotecas = Biblioteca::all();
        $personas = Persona::all();
        $persona = DB::table('personas')
            ->where('id', $request->persona_id)
            ->first();
        // $persona = Persona::where('id', $request->persona_id);
    
        return view('empleados.empleadoForm', compact('personas', 'empleado', 'bibliotecas', 'persona'));
    }
}
