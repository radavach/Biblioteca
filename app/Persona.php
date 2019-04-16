<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $guarded = ['id'];

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }
    
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }
}
