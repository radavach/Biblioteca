<?php

namespace App\Http\Controllers;

use App\Biblioteca;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create()
    {
        $bibliotecas = Biblioteca::all();
        return view('auth.register', compact('bibliotecas'));
    }
}
