<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovimientoLibroController extends Controller
{
    //
    public function __construct()
    {
        // if(isset($_SESSION['biblioteca'])) unset($_SESSION['biblioteca']);
        $this->middleware('auth')->except('index', 'show');
        // $this->middleware('admin')->only('create', 'store', 'edit', 'update', 'destroy');
    }
}
