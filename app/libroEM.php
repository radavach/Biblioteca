<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libroEM extends Model
{
    //
    protected $table = 'ejemplar_l_movimiento_l';
    protected $guared = ['id'];

    public function ejemplar_l()
    {
        return $this->belongsTo(EjemplarL::class);
    }
    public function movimiento_l()
    {
        return $this->belongsTo(MovimientoL::class);
    }
}
