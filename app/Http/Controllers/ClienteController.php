<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Biblioteca;
use App\Persona;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Cliente::all();
        return view('clientes.clienteIndex', compact('clientes'));
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
        return view('clientes.clienteForm', compact('bibliotecas'));
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
            'apellidoMaterno' => 'required|min:3',
            'nombreUsuario' => 'required|min:3',
            'email' => 'required|min:3',
            'biblioteca_id' => 'required',
        ]);

        $persona = Persona::create($request->all());
        $cliente = Cliente::create(['persona_id' => $persona->id, 'idCliente' => $persona->id]);
        
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
        $persona = $cliente->persona;
        return view('clientes.clienteShow', compact('cliente', 'persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
        $bibliotecas = Biblioteca::all();
        $persona = $cliente->persona;
        return view('clientes.clienteForm', compact('cliente', 'bibliotecas', 'persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
        $request->validate([
            'nombre' => 'required|min:3',
            'apellidoPaterno' => 'required|min:3',
            'apellidoMaterno' => 'nullable|min:3',
            'nombreUsuario' => 'required|min:3',
            'email' => 'required|min:3',
            'biblioteca_id' => 'required',
        ]);
        
        $cliente->persona()->update($request->all());

        return redirect()->route('clientes.show', $cliente->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
        $cliente->persona()->delete();
        return redirect()->route('clientes.index')
            ->with([
                'mensaje' => 'Cliente Eliminado',
                'alert-class' => 'alert-warning',
            ]);
    }
}
