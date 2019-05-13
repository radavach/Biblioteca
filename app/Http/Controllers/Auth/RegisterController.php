<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected $redirectTo = '/info';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'nombre' => ['required', 'max:255'],
            'apellidoPaterno' => ['required', 'max:255'],
            'nombreUsuario' => ['required', 'max:255'],
            'direccion' => ['required', 'max:255'],
            'biblioteca_id' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $esAdmin = false;
        if(isset($data['esAdmin']))
        {
            $data['esAdmin'] === 'TRUE' ? $esAdmin = true :  $esAdmin = false;
        }

        $name = $data['nombre'] . " " . $data['apellidoPaterno'] . " " . $data['apellidoMaterno'];

        return User::create([
            // 'name' => $data['name'],
            'name' => $name,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nombre' => $data['nombre'],
            'apellidoPaterno' => $data['apellidoPaterno'],
            // if(isset($data['apellidoMaterno']))'apellidoPaterno' => $data['apellidoPAterno'],
            'apellidoMaterno' => $data['apellidoMaterno'],
            'nombreUsuario' => $data['nombreUsuario'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'rfc' => $data['rfc'],
            'biblioteca_id' => $data['biblioteca_id'],
            'esAdmin' => $esAdmin,
        ]);
    }
}
