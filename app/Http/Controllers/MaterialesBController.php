<?php

namespace App\Http\Controllers;

use App\Material;
use App\Biblioteca;
use Illuminate\Http\Request;

class MaterialesBController extends Controller
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
    public function index(Biblioteca $biblioteca_id, Request $request)
    {
        //
        if(!empty($request->buscar)){
            // dd($request);
            $materiales = Material::where('biblioteca_id', $biblioteca_id->id)
                    ->where('nombre', 'like', '%'.$request->buscar.'%')
                    ->with('ejemplares')
                    ->orderBy('nombre')
                    ->paginate(5);
        }
        else{
            $materiales = Material::where('biblioteca_id', $biblioteca_id->id)
                    ->with('ejemplares')
                    ->paginate(5);
        }
        return view('materiales.materialIndex', compact('biblioteca_id', 'materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($biblioteca_id)
    {
        //
        $bibliotecas = biblioteca::where('id', $biblioteca_id)->get();
        return view('materiales.materialForm', compact('biblioteca_id', 'bibliotecas'));
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
            'idArticulo' => ['required'],
            'nombre' => ['required', 'max:255', 'string'],
            'seccion' => ['required', 'alpha_num'],
            'tipo' => ['required'],
            'ejemplar' => ['required', 'numeric'],
            'linkImagen' => ['required', 'image' => 'mimes:jpeg,png'],
            'autor' => ['required', 'max:255', 'string'],
            'anio' => ['required', 'date_format:Y'],
            'biblioteca_id' => ['required'],
        ]);

        $material = Material::create($request->all());
        return redirect()->route('materiales.index', $biblioteca_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show($biblioteca_id, Material $material)
    {
        //
        return view('materiales.materialShow', compact('biblioteca_id', 'material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($biblioteca_id, Material $material)
    {
        //
        $bibliotecas = Biblioteca::all();
        return view('materiales.materialForm', compact('biblioteca_id', 'bibliotecas', 'material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $biblioteca_id, Material $material)
    {
        //
        $request->validate([
            'idArticulo' => 'required',
            'nombre' => 'required',
            'seccion' => 'required',
            'tipo' => 'required',
            'ejemplar' => 'required',
            'linkImagen' => 'required',
            'autor' => 'required',
            'anio' => 'required',
            'biblioteca_id' => 'required',
        ]);

        $material->update($request->all());

        return redirect()->route('materiales.index', $biblioteca_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($biblioteca_id, Material $material)
    {
        //
        $material->delete();
        return redirect()->route('materiales.index', $biblioteca_id)
            ->with([
                'mensaje' => 'Material Eliminado',
                'alert-class' => 'alert-warning',
            ]);
    }
}
