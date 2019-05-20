<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //
    protected $guarded = ['id'];

    public function biblioteca()
    {
        return $this->belongsTo(Biblioteca::class);
    }
    public function ejemplares()
    {
        return $this->hasMany(Ejemplar::class);
    }
    // public function ejemplares()
    // {
    //     return $this->hasMany(Ejemplar::class);
    // }
}
