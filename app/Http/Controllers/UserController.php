<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Biblioteca;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function perfil()
    {
        return view('users.perfil');
    }
    
    public function editPerfil()
    {
        $bibliotecas = Biblioteca::all();
        $usuario = \Auth::user();
        return view('auth.register', compact('bibliotecas', 'usuario'));
    }
    
    public function updatePerfil(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'nombre' => ['required', 'max:255'],
            'apellidoPaterno' => ['required', 'max:255'],
            'nombreUsuario' => ['required', 'max:255'],
            'direccion' => ['required', 'max:255'],
            'biblioteca_id' => ['required'],
        ]);
     
        // dd($request);   

        if(isset($request['esAdmin']))
        {
            $request['esAdmin'] === 'TRUE' ? $esAdmin = TRUE :  $esAdmin = FALSE;
        }
        
        if($request['esAdmin'])
        {
            unset($request['biblioteca_id']);
        }

        $name = $request['nombre'] . " " . $request['apellidoPaterno'] . " " . $request['apellidoMaterno'];
        $password = \Auth::user()->password;

        if($request['password'] != NULL)
        {
            $password = Hash::make($request['password']);
            dd($password);
        }

        \Auth::user()->update([
            'name' => $name,
            'email' => $request['email'],
            'password' => $password,
            'nombre' => $request['nombre'],
            'apellidoPaterno' => $request['apellidoPaterno'],
            'apellidoMaterno' => $request['apellidoMaterno'],
            'nombreUsuario' => $request['nombreUsuario'],
            'telefono' => $request['telefono'],
            'direccion' => $request['direccion'],
            'rfc' => $request['rfc'],
            'biblioteca_id' => $request['biblioteca_id'],
            'esAdmin' => $esAdmin,
        ]);

        return redirect()->route('profile.index');

    }
    
    public function editPhoto()
    {
        session()->forget('num_imagenes');
        session()->flash('num_imagenes', 80);
        return view('users.editPhoto');
    }

    public function updatePhoto($photo)
    {
        if($photo != session()->get('num_imagenes'))
        {
            \Auth::user()->imagen = $photo;
            \Auth::user()->save();
        }
        
        return redirect()->route('profile.index');
    }
}
