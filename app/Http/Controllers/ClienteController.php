<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Biblioteca;
use App\Persona;
use App\EjemplarL;
use App\libroEM;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        // if(isset($_SESSION['biblioteca'])) unset($_SESSION['biblioteca']);
        $this->middleware('auth')->except('index', 'show');
        // $this->middleware('admin')->only('create', 'store', 'edit', 'update', 'destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Biblioteca $biblioteca_id)
    {
        //
        $clientes = Cliente::paginate(10);

        return view('clientes.clienteIndex', compact('biblioteca_id', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($biblioteca_id)
    {
        //
        return view('clientes.clienteForm', compact('biblioteca_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $biblioteca_id)
    {
        //
        $request->validate([
            'nombre' => ['required', 'max:200', 'string'],
            'apellidoPaterno' => ['required', 'max:100', 'string'],
            'apellidoMaterno' => ['required','max:100', 'string'],
            'nombreUsuario' => ['required','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'biblioteca_id' -=> ['required'],          
        ]);

        $cliente = Cliente::create($request->all());
        
        return redirect()->route('bibliotecas.clientes.index', $biblioteca_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($biblioteca_id, Cliente $cliente)
    {
        return view('clientes.clienteShow', compact('biblioteca_id', 'cliente', 'persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($biblioteca_id, Cliente $cliente)
    {
        //
        return view('clientes.clienteForm', compact('biblioteca_id', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $biblioteca_id, Cliente $cliente)
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

        return redirect()->route('bibliotecas.clientes.show', [$biblioteca_id, $cliente->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($biblioteca_id, Cliente $cliente)
    {
        //
        $cliente->persona()->delete();
        return redirect()->route('bibliotecas.clientes.index')
            ->with([
                'mensaje' => 'Cliente Eliminado',
                'alert-class' => 'alert-warning',
            ]);
    }

    public function adeudos($biblioteca_id)
    {

        $clientes = [];
        $deudas = [];

        $registro = libroEM::all();

        $ejemplares = libroEM::where([[ 'devuelto', '0']])->with('movimiento_l')->get();
        foreach($ejemplares as $ejemplar)
        {
            if($ejemplar->ejemplar_L->libro->biblioteca_id != $biblioteca_id) continue;
            array_push($deudas, $ejemplar);
            array_push($clientes, $ejemplar->movimiento_l->cliente);
        }

        return view('clientes.clienteDeudas', compact('biblioteca_id', 'clientes', 'deudas'));
    }
}
