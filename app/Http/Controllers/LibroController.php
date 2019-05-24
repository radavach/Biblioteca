<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Biblioteca;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libros = Libro::all();
        return view('libros.libroIndex', compact('libros'));
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
        return view('libros.libroForm', compact('bibliotecas'));
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
            'isbn' => 'required',
            'titulo' => 'required',
            'subtitulo' => 'nullable',
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

        $libro = Libro::create($request->except('numEjemp', 'origen', 'estado', 'comentario'));

        return redirect()->route('libros.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
        return view('libros.libroShow', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        //
        // $ejemplares = $libro->ejemplares();
        // $bibliotecas = Biblioteca::all();
        // return view('libros.libroForm', compact('bibliotecas', 'ejemplares', 'libro'));

        // return view('bibliotecas.librosB.edit', [$libro->biblioteca_id, $libro]);
        return redirect()->route('bibliotecas.libros.edit', [$libro->biblioteca_id, $libro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
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
    public function destroy(Libro $libro)
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
