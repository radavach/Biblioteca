<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Biblioteca;
use Illuminate\Http\Request;


class LibroController extends Controller
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
            $libros = Libro::where('titulo', 'like', '%'.$request->buscar.'%')
            ->with('ejemplares')
            ->orderBy('titulo')
            ->paginate(10);
        }
        else{
            $libros = Libro::with('ejemplares')->paginate(10);
        }
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
            'isbn' =>['required','numeric','digits_between:10,13' ] ,
            'titulo' => ['required','max:255', 'string'],
            'subtitulo' => ['nullable', 'max:200'],
            'autor' =>['required','max:255','string'],
            'editorial' =>['required','max:255', 'string'],
            'anio' => ['required', 'date_format:Y'],
            'genero' => ['nullable', 'string', 'max:200'],
            'idioma' => ['required', 'string'],
            'seccion' => ['nullable', 'alpha_num'],
            'ejemplar' => ['nullable', 'numeric'],
            'diasMaxPrestamo' => ['required', 'numeric'],
            'link' => ['required'],
            'biblioteca_id' => ['required'],
        ]);
        $libro = Libro::create($request->except('numEjemp', 'origen', 'estado', 'comentario') + ['link' => $request->link]);

        if($request->hasFile('link'))
        {
            $file = $request->file('link');
            ///No se repetira el nombre del archivo
            $linkImagen = time().$file->getClientOriginalName();
            //Se obtiene la direccion completa del archivio
            $link = asset('/images-database/'.$linkImagen);
            //Es en la carpeta public ahí se almacenarán las imagenes 
            $file->move(public_path().'/images-database/', $linkImagen);
            //Se guardan los cambios sobre la imagen
            $libro->update(['link' => $link, 'linkImagen' => $linkImagen]);
        }

        // $libro->link = $nombre;
        
        
        return redirect()->route('libros.index');

    }
}
