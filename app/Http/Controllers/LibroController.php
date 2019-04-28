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
            'isbn' => 'require',
            'titulo' => 'require',
            'subtitulo' => 'require',
            'autor' => 'require',
            'editorial' => 'require',
            'anio' => 'require',
            'genero' => 'require',
            'idioma' => 'require',
            'seccion' => 'require',
            'ejemplar' => 'require',
            'diasMaxPrestamo' => 'require',
            'linkImagen' => 'require',
            'idBiblioteca' => 'require',
        ]);

        $libro = Libro::create($request->except('numEjemp', 'origen', 'estado', 'comentario'));

        $estado = $request->estado === "TRUE" ? true : false;

        $ejemplar = Ejemplar::create([
            'numEjemp' => $request->numEjemp,
            'origen' => $request->origen,
            'estado' => $estado,
            'comentario' => $request->comentario,
            'biblioteca_id' => $biblioteca->id,
        ]);

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
        $ejemplares = $libro->ejemplares();
        $bibliotecas = Biblioteca::all();
        return view('librerias.libreriaForm', compact('bibliotecas', 'ejemplares', 'libro'));
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
            'isbn' => 'require',
            'titulo' => 'require',
            'subtitulo' => 'require',
            'autor' => 'require',
            'editorial' => 'require',
            'anio' => 'require',
            'genero' => 'require',
            'idioma' => 'require',
            'seccion' => 'require',
            'ejemplar' => 'require',
            'diasMaxPrestamo' => 'require',
            'linkImagen' => 'require',
            'idBiblioteca' => 'require',
        ]);

        $libro->update($request->except('numEjemp', 'origen', 'estado', 'comentario'));

        $estado = $request->estado === "TRUE" ? true : false;

        $libro->update([
            'numEjemp' => $request->numEjemp,
            'origen' => $request->origen,
            'estado' => $estado,
            'comentario' => $request->comentario,
            'biblioteca_id' => $biblioteca->id,
        ]);

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
