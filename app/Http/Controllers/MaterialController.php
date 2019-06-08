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
    public function index(Request $request)
    {
        if(!empty($request->buscar)){
            $materiales = Material::where('titulo', 'like', '%'.$request->buscar.'%')
                ->with('ejemplares')
                ->orderBy('titulo')
                ->paginate(10);
        }
        else{
            //Se sacan todos los materiales de la tabla con el mismo nombre
            $materiales = Material::with('ejemplares')->paginate(10);
        }
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
            'idArticulo' => ['required'],
            'nombre' => ['required', 'max:255', 'string'],
            'seccion' => ['nullable', 'alpha_num'],
            'tipo' => ['nullable'],
            'ejemplar' => ['nullable', 'numeric'],
            'linkImagen' => ['nullable', 'image' => 'mimes:jpeg,png'],
            'autor' => ['nullable', 'max:255', 'string'],
            'anio' => ['nullable', 'date_format:Y'],
            'biblioteca_id' => ['required'],
        ]);

        $material = Material::create($request->all());

        return redirect()->route('materiales.index');
    }
}
