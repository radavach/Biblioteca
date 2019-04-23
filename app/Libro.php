<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //
    protected $guerded = ['id'];

    public function biblioteca()
    {
        return $this->belongTo(Biblioteca::class);
    }
}
