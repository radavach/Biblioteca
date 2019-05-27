<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $guarded = ['id'];

    public function movimiento_l()
    {
        return $this->hasMany(MovimientoL::class);
    }
}
