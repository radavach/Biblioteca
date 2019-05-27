<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Biblioteca;
use App\EjemplarL;
use Illuminate\Http\Request;

class LibrosBController extends Controller
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
    public function index(Request $request, $biblioteca_id)
    {
        
        if(!empty($request->buscar)){
            $libros = Libro::where([
                ['biblioteca_id', $biblioteca_id],
                ['titulo', 'like', '%'.$request->buscar.'%'],])
                ->with('ejemplares')
                ->orderBy('titulo')
                ->paginate(10);
        }
        else{
            // dd($request);
            $libros = Libro::where('biblioteca_id', $biblioteca_id)
                ->with(['ejemplares'])
                ->paginate(10);
        }
            
        return view('libros.libroIndex', compact('biblioteca_id', 'libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($biblioteca_id)
    {
        //
        // $bibliotecas = Biblioteca::all();
        $bibliotecas = Biblioteca::where('id', $biblioteca_id)->get();
        return view('libros.libroForm', compact('bibliotecas', 'biblioteca_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($biblioteca_id, Request $request)
    {
        //
        $request->validate([
            'isbn' => 'required',
            'titulo' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'anio' => 'required',
            'idioma' => 'required',
            'diasMaxPrestamo' => 'required',
            'biblioteca_id' => 'required',
        ]);

        $libro = Libro::create($request->except('numEjemp', 'origen', 'estado', 'comentario'));

        return redirect()->route('bibliotecas.libros.index', $biblioteca_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show($biblioteca_id, Libro $libro)
    {
        //
        return view('libros.libroShow', compact('libro', 'biblioteca_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($biblioteca_id, Libro $libro)
    {
        //
        $ejemplares = $libro->ejemplares();
        $bibliotecas = Biblioteca::all();
        return view('libros.libroForm', compact('biblioteca_id', 'bibliotecas', 'ejemplares', 'libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update($biblioteca_id, Request $request, Libro $libro)
    {
        //
        $request->validate([
            'isbn' => 'required',
            'titulo' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'anio' => 'required',
            //'genero' => 'required',
            'idioma' => 'required',
            // 'seccion' => 'required',
            // 'ejemplar' => 'required',
            'diasMaxPrestamo' => 'required',
            // 'linkImagen' => 'required',
            'biblioteca_id' => 'required',
        ]);

        $libro->update($request->except('numEjemp', 'origen', 'estado', 'comentario'));

       

        return redirect()->route('bibliotecas.libros.index', $biblioteca_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($biblioteca_id, Libro $libro)
    {
        //
        $libro->delete();
        return redirect()->route('bibliotecas.libros.index', $biblioteca_id)
            ->with([
                'mensaje' => 'Libro Eliminado',
                'alert-class' => 'alert-warning',
            ]);
    }
}
