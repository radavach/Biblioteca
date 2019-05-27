<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoL extends Model
{
    //
    protected $table = 'MovimientoL';
    protected $guarded = ['id'];

    public function ejemplares()
    {
        return $this->belongsToMany(EjemplarL::class)->withPivot('fechaPrestamo', 'fechaDevolucion', 'comision', 'isbnLibro', 'numEjemplar', 'devuelto');
    }
}
