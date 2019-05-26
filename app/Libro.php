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
        return $this->hasMany(EjemplarL::class);
    }
    // public function atributo($path)
    // {
    //     $this->atributo['path'] = Carbon::now()->second.$path->getLibroOriginalName();
    //     $nombre = Carbon::now()->second.$path->getLibroOriginalName();
    //     \Storage::disk('local')->put($nombre, \File::get($path));
    // }
    // public function ejemplares()
    // {
    //     return $this->hasMany(Ejemplar::class);
    // }
}
