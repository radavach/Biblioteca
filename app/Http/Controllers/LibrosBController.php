<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Biblioteca;
use Illuminate\Http\Request;

class LibrosBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($biblio)
    {
        //
        // $libros = Libro::all();
        $libros = Libro::where('biblioteca_id', $biblio)->get();
        return view('libros.libroIndex', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($biblio)
    {
        //
        // $bibliotecas = Biblioteca::all();
        $bibliotecas = Biblioteca::where('id', $biblio)->get();
        return view('libros.libroForm', compact('bibliotecas', 'biblio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($biblio, Request $request)
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

        return redirect()->route('libros.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show($biblio, Libro $libro)
    {
        //
        return view('libros.libroShow', compact('libro', 'biblio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($biblio, Libro $libro)
    {
        //
        $ejemplares = $libro->ejemplares();
        $bibliotecas = Biblioteca::all();
        return view('libros.libroForm', compact('biblio', 'bibliotecas', 'ejemplares', 'libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update($biblio, Request $request, Libro $libro)
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

       

        return redirect()->route('bibliotecas.libros.index', $biblio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($biblio, Libro $libro)
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
