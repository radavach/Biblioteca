<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biblioteca extends Model
{
    // use SoftDeletes;
    //
    protected $guarded = ['id'];

    public function setNombreAttribute($nombre)
    {
        $this->attributes['nombre'] = mb_strtoupper($nombre);
    }
}
