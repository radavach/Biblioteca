<?php

namespace App\Http\Controllers;

use App\Biblioteca;
use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
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
    public function index()
    {
        //Se sacan todos los materiales de la tabla con el mismo nombre
        $materiales = Material::all();
        return view('materiales.materialIndex', compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se manda la informacion de todas las bibliotecas para saber a cual asignarla
        $bibliotecas = Biblioteca::all();
        return view('materiales.materialForm', compact('bibliotecas'));
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
            'idArticulo' => 'required',
            'nombre' => 'required',
            'seccion' => 'nullable',
            'tipo' => 'nullable',
            'ejemplar' => 'nullable',
            'linkImagen' => 'nullable',
            'autor' => 'nullable',
            'anio' => 'nullable',
            'biblioteca_id' => 'required',
        ]);

        $material = Material::create($request->all());

        return redirect()->route('materiales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
        return view('materiales.materialShow', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //

        $bibliotecas = Biblioteca::all();
        return view('materiales.materialForm', compact('bibliotecas', 'material'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
        $request->validate([
            'idArticulo' => 'required',
            'nombre' => 'required',
            'seccion' => 'nullable',
            'tipo' => 'nullable',
            'ejemplar' => 'nullable',
            'linkImagen' => 'nullable',
            'autor' => 'nullable',
            'anio' => 'nullable',
            'biblioteca_id' => 'required',
        ]);

        $material->update($request->all());

        return redirect()->route('materiales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
        $material->delete();
        return redirect()->route('materiales.index')
            ->with([
                'mensaje' => 'Material Eliminado',
                'alert-class' => 'alert-warning',
            ]);
    }
}
