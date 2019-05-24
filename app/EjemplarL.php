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
}
