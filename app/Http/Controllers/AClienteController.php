<?php

namespace App\Http\Controllers;
use App\Cliente;

use Illuminate\Http\Request;

class AClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Cliente::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //verificamos que el request sea enviado bien
        if (!is_array($request->all())) {
            return ['error' => 'La informacion proporcionada en el request debe ser un arreglo'];
        }

        //reglas de la validacion
        $reglas = [
            'nombre' => 'required|min:3',
            'apellidoPaterno' => 'required|min:3',
            'apellidoMaterno' => 'required|min:3',
            'nombreUsuario' => 'required|min:3',
            'email' => 'required|min:3|email',
            'telefono' => 'required',
            'biblioteca_id' => 'required',
        ];

        try{
            $validator = \Validator::make($request->all(), $reglas);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors'  => $validator->errors()->all()
                ];
            }

            $cliente = Cliente::create($request->all());
            return [ 'created' => true];
        } catch(Exception $e){
            \Log::info('Error creando cliente: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Cliente::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cliente = Cliente::find($id);
        $cliente->update($request->all());
        return ['updated' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cliente::destroy($id);
        return ['deleted' => true];
    }
}
