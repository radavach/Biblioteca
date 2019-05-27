<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\libroEM;

use App\Mail\Cliente;
use Illuminate\Support\Facades\Mail;

class NotificarUsuario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clientes:notificacion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deberia notificar al usuario del dia de vencimiento de su prestamo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $pendientes = libroEM::where('devuelto', '0');
        foreach($pendientes as $pendiente)
        {
            dd($pendiente->libro->titulo);
            $fechaInicio = $pendiente->fechaPrestamo;
            $fechaFin = date ( 'Y-m-j' , strtotime($pendiente->fechaPrestamo. "+ ".$pendiente->libro->diasMaxPrestamo." days"));
            if($fechaInicio == $fechaFin)
            {
                Mail::to($pendiente)->send(new Cliente($pendiente->libro->titulo));
            }
        }

    }
}
