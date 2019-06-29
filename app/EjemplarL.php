<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EjemplarL extends Model
{
    //
    protected $table = 'EjemplarL';
    protected $guarded = ['id'];

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    public function cambiarEstado()
    {
        $this->estado = !$this->estado;
        $this->save();
    }

    public function movimientos()
    {
        return $this->belongsToMany(MovimientoL::class)->withPivot('fechaPrestamo', 'fechaDevolucion', 'comision', 'isbnLibro', 'numEjemplar', 'devuelto');
    }

    public function movimientosFaltantes()
    {
        $return = $this->belongsToMany(MovimientoL::class)->wherePivot('devuelto', FALSE)->withPivot('fechaPrestamo', 'fechaDevolucion', 'comision', 'isbnLibro', 'numEjemplar', 'devuelto');
        return $return;
    }
}
