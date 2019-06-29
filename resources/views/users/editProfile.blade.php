@extends('layouts.tabler')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ __('Registrar nuevo empleado') }}</h3></div>

                <div class="card-body">
                    @if(!isset($usuario))
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    @else
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    @endif
                        <div class="container">

                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $cliente->email ?? old('email') }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @isset($cliente) @dd($cliente) @endisset

                        <div class="form-group">
                            <div class="row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
    
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required>
    
                                    @if ($errors->has('nombre'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="apellidoPaterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="apellidoPaterno" type="text" class="form-control{{ $errors->has('apellidoPaterno') ? ' is-invalid' : '' }}" name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" required>
                                    
                                    @if ($errors->has('apellidoPaterno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellidoPaterno') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <label for="apellidoMaterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="apellidoMaterno" type="text" class="form-control{{ $errors->has('apellidoMaterno') ? ' is-invalid' : '' }}" name="apellidoMaterno" value="{{ old('apellidoMaterno') }}">
                                    
                                    @if ($errors->has('apellidoMaterno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellidoMaterno') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <label for="nombreUsuario" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="nombreUsuario" type="text" class="form-control{{ $errors->has('nombreUsuario') ? ' is-invalid' : '' }}" name="nombreUsuario" value="{{ old('nombreUsuario') }}" required>
                                    
                                    @if ($errors->has('nombreUsuario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreUsuario') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}">
                                    
                                    @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}">
                                    
                                    @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="rfc" class="col-md-4 col-form-label text-md-right">{{ __('RFC') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="rfc" type="text" class="form-control{{ $errors->has('rfc') ? ' is-invalid' : '' }}" name="rfc" value="{{ old('rfc') }}">
                                    
                                    @if ($errors->has('rfc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rfc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="esAdmin" class="col-md-4 col-form-label text-md-right">{{ __('Es Administrador') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="esAdmin" type="radio" class="{{ $errors->has('esAdmin') ? ' is-invalid' : '' }}" name="esAdmin" value="TRUE" checked> SI <br>
                                    <input id="esAdmin" type="radio" class="{{ $errors->has('esAdmin') ? ' is-invalid' : '' }}" name="esAdmin" value="FALSE"> NO <br>
                                    
                                    @if ($errors->has('esAdmin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('esAdmin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="biblioteca_id" class="col-md-4 col-form-label text-md-right">{{ __('Bibliotecas') }}</label>
                                
                                <div class="col-md-6">
                                    <select id="biblioteca_id" name="biblioteca_id" class="form-control{{ $errors->has('biblioteca_id') ? ' is-invalid' : '' }}">
                                        @foreach($bibliotecas as $biblioteca)
                                        <option value="{{ $biblioteca->id }}" {{ Auth::user() !== null && (Auth::user()->biblioteca_id == $biblioteca->id) !== false ? 'selected' : ''}}>{{ $biblioteca->nombre }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @if ($errors->has('biblioteca_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('biblioteca_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
