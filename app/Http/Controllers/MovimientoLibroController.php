<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\EjemplarL;
use App\Biblioteca;
use App\Cliente;
use App\MovimientoL;
use App\EjemplarL_MovimientoL;

class MovimientoLibroController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra un formato para el prestamo de libros
     */
    public function inicio(Request $request)
    {
        
        $ejemplar = NULL;
        $cliente = NULL;
        $mensaje = NULL;
        $alert = NULL;

        if(!empty($request->ejemplar))
        {
            $ejemplar = EjemplarL::where('id', $request->ejemplar)->first();

            if ($ejemplar != NULL){

                if(!$ejemplar->estado) {
                    $mensaje = 'El libro esta prestado para realizar entrega ingresa el id del cliente';
                    $alert = 'alert-success';
                }
                else
                {
                    // $mensaje = 'Libro disponible';
                    // $alert = 'alert-success';
                }
            }
            else{
                $mensaje =  'El ejemplar no se encuentra en los registros';
                $alert = 'alert-danger';
            }
        }
        if(!empty($request->cliente))
        {
            $cliente = Cliente::where('id', $request->cliente)->first();

            if ($cliente == NULL){
                $mensaje = 'El Cliente en el ID '. $request->cliente .' no se encuentra en los registros';
                $alert = 'alert-success';
            }
        }
        
        if($mensaje != NULL)
        {
            session()->flash('mensaje', $mensaje);
            session()->flash('alert-class', $alert);
        } 
        
        return view('ejemplaresL.prestamo', compact('ejemplar', 'cliente'));
    }
    
    public function prestamo(Cliente $cliente, EjemplarL $ejemplar)
    {
        dd($cliente);
        $movimiento = MovimientoL::create([
            'user_id' => \Auth::user()->id,
            'cliente_id' => $cliente->id,
            
            'nombreUsuario' => $cliente->nombreUsuario,
            'rfcCliente' => $cliente->rfc,
            'comisionTotal' => '0',
        ]); 

        $ejemplar->cambiarEstado();

        $movimiento->ejemplares()->attach(
            [$ejemplar->id],
            [
                'fechaPrestamo' => \Carbon\Carbon::now()->timezone('America/Mexico_City')->toDateString(), 
                'comision' => '0',
                'isbnLibro' => $ejemplar->libro->isbn,
                'numEjemplar' => $ejemplar->numEjemp, 
                'devuelto' => FALSE,
            ]
        );

        return redirect()->route('movimientos.inicio')
            ->with([
                'mensaje' => 'El prestamo se realizo con exito',
                'alert-class' => 'alert-warning',
            ]);
    }

    public function entrega(Cliente $cliente, EjemplarL $ejemplar)
    {
        $movimiento = $ejemplar->movimientosFaltantes->first();
        $mensaje = NULL;
        $alert = NULL;

        // dd($movimiento->cliente_id);

        if($movimiento->cliente_id == $cliente->id)
        {
            $ejemplar->cambiarEstado();
            $ejemplar->movimientosFaltantes()->updateExistingPivot($movimiento->id, ['fechaDevolucion'=> \Carbon\Carbon::now()->timezone('America/Mexico_City')->toDateString(), 'devuelto'=>TRUE]);

            $mensaje = 'La entrega se realizo con exito';
            $alert = 'alert-warning';
        }
        else
        {
            $mensaje = 'El cliente que realiza la entrega debe ser el mismo que registro el prestamo';
            $alert = 'alert-danger';
        }


        return redirect()->back()
        ->with([
                'mensaje' => $mensaje,
                'alert-class' => $alert,
            ]);
    }
}
