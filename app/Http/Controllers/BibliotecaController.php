<?php

namespace App\Http\Controllers;

use App\Biblioteca;
use Illuminate\Http\Request;

if(!isset($_SESSION)) session_start();

class BibliotecaController extends Controller
{
    public function __construct()
    {
        // if(isset($_SESSION['biblioteca'])) unset($_SESSION['biblioteca']);
        $this->middleware('auth')->except('index', 'show');
        $this->middleware('admin')->only('create', 'store', 'edit', 'update', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        unset($_SESSION['biblioteca']);

        if (!empty($request->buscar)) {
            $bibliotecas = Biblioteca::where('nombre', 'like', '%'.$request->buscar.'%')
                ->orderBy('nombre')
                ->paginate(10);
        } else {
            $bibliotecas = Biblioteca::orderBy('nombre')->paginate(10);
        }

        // $bibliotecas = Biblioteca::all();
        return view('bibliotecas.bibliotecaIndex', compact('bibliotecas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bibliotecas.bibliotecaForm');
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
            'horaApertura' => 'required',
            'horaCierre' => 'required',
            'email' => 'required',
        ]);

        $biblioteca = Biblioteca::create($request->all());

        return redirect()->route('bibliotecas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function show(Biblioteca $biblioteca)
    {
        //
        // dd($biblioteca->id);
        return redirect()->route('bibliotecas.bibliotecas.index', $biblioteca);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function edit(Biblioteca $biblioteca)
    {
        //
        return view('bibliotecas.bibliotecaForm', compact('biblioteca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biblioteca $biblioteca)
    {
        //    
        $request->validate([
            'nombre' => 'required|min:3',
            'horaApertura' => 'required',
            'horaCierre' => 'required',
            'email' => 'required',
        ]);
        
        $biblioteca->update($request->all());

        return redirect()->route('bibliotecas.show', $biblioteca->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biblioteca $biblioteca)
    {
        //
        $biblioteca->delete();
        return redirect()->route('bibliotecas.index')
            ->with([
                'mensaje' => 'Biblioteca Eliminada',
                'alert-class' => 'alert-warning',
            ]);
    }
}
