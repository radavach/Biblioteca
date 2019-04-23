<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Biblioteca;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personas = Persona::all();
        return view('personas.personaIndex', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bibliotecas = Biblioteca::all();
        return view('personas.personaForm', compact('bibliotecas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    
        $request->validate([
            'nombre' => 'required|min:3',
            'apellidoPaterno' => 'required|min:3',
            'apellidoMaterno' => 'nullable|min:3',
            'nombreUsuario' => 'required|min:3|max:7',
            'email' => 'required|min:3',
        ]);

        $persona = Persona::create($request->all());
        
        return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
        return view('personas.personaShow', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
        return view('personas.personaForm', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
        $request->validate([
            'nombre' => 'required|min:3',
            'apellidoPaterno' => 'required|min:3',
            'apellidoMaterno' => 'nullable|min:3',
            'nombreUsuario' => 'requires|min:3',
            'email' => 'required|min:3',
            'idBiblioteca' => 'required|min:3',
        ]);
        
        $persona->update($request->all());

        return redirect()->route('personas.show', $persona->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
        $persona->delete();
        return redirect()->route('personas.index')
            ->with([
                'mensaje' => 'Persona Eliminadad',
                'alert-class' => 'alert-warning',
            ]);
    }
}
