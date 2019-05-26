<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $table = 'Materiales';
    protected $guarded = ['id'];

    public function ejemplares()
    {
        return $this->hasMany(EjemplarM::class);
    }
    public function biblioteca()
    {
        return $this->belongsTo(Biblioteca::class);
    }
}
