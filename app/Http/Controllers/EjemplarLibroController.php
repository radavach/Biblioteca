<?php

namespace App\Http\Controllers;

use App\EjemplarL;
use App\Libro;
use App\MovimientoL;
use Illuminate\Http\Request;

class EjemplarLibroController extends Controller
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
    public function index(Request $request, $biblioteca_id, $libro_id)
    {
        $libro = Libro::where('id', $libro_id);
        return view('ejemplaresL.ejemplarIndex', compact('bilbioteca_id', 'libros', 'libro', 'ejemplar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($biblioteca_id, $libro_id)
    {
        //
        $libro = Libro::where('id', $libro_id)->first();
        // dd($libro);
        return view('ejemplaresL.ejemplarForm', compact('biblioteca_id', 'libro_id', 'libro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $biblioteca_id, $libro_id)
    {
        //
        $request->validate([
            'numEjemp' => 'nullable',
            'origen' => 'nullable',
            'estado' => 'required',
            'comentario' => 'nullable',
        ]);

        $ejemplar = EjemplarL::create($request->all() + ['libro_id' => $libro_id]);

        return redirect()->route('bibliotecas.libros.index', [$biblioteca_id, $libro_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show($biblioteca_id, $libro_id, EjemplarL $ejemplar)
    {
        //
        $ejemplar = EjemplarL::where('id', $ejemplar->id)
        ->with(['movimientos' => function($query){
            $query->where('devuelto', '0')->with(['user', 'cliente']);
        }])->first();
        return view('ejemplaresL.ejemplarIndex', compact('biblioteca_id', 'libro_id', 'ejemplar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($biblioteca_id, $libro_id, EjemplarL $ejemplar)
    {
        $libro = Libro::where('id', $libro_id)->first();
        return view('ejemplaresL.ejemplarForm', compact('biblioteca_id', 'libro_id', 'libro', 'ejemplar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $biblioteca_id, $libro_id, EjemplarL $ejemplar)
    {
        //
        $request->validate([
            'isbn' => 'required',
            'titulo' => 'required',
            // 'subtitulo' => 'nullable',
            'autor' => 'required',
            'editorial' => 'required',
            'anio' => 'required',
            'genero' => 'nullable',
            'idioma' => 'required',
            'seccion' => 'nullable',
            'ejemplar' => 'nullable',
            'diasMaxPrestamo' => 'required',
            'linkImagen' => 'nullable',
            'biblioteca_id' => 'required',
        ]);

        $libro->update($request->except('numEjemp', 'origen', 'estado', 'comentario'));

       

        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($biblioteca_id, $libro_id, EjemplarL $libro)
    {
        //
        $libro->delete();
        return redirect()->route('libros.index')
            >with([
                'mensaje' => 'Libro Eliminado',
                'alert-class' => 'alert-warning',
            ]);
    }
}
