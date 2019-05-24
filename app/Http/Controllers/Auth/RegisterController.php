<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Biblioteca;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

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
        $this->middleware('esAdminMw');
    }


    public function showRegistrationForm()
    {
        $bibliotecas = Biblioteca::all();
        return view('auth.register', compact('bibliotecas'));
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
        $esAdmin = FALSE;
        if(isset($data['esAdmin']))
        {
            $data['esAdmin'] === 'TRUE' ? $esAdmin = true :  $esAdmin = false;
        }

        $name = $data['nombre'] . " " . $data['apellidoPaterno'] . " " . $data['apellidoMaterno'];

        return User::create([
            'name' => $name,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nombre' => $data['nombre'],
            'apellidoPaterno' => $data['apellidoPaterno'],
            'apellidoMaterno' => $data['apellidoMaterno'],
            'nombreUsuario' => $data['nombreUsuario'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'rfc' => $data['rfc'],
            'biblioteca_id' => $data['biblioteca_id'],
            'esAdmin' => $esAdmin,
        ]);

    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

}
