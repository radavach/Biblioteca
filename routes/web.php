<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Info', 'PaginaController@info');
Route::get('/bienvenida/{nombre}/{apellido?}', function ($nombre, $apellido = null) {
    //return $nombre.' '.$apellido;
    return view('Paginas.bienvenida', compact('nombre', 'apellido'))
    ->with(['nombre_completo'=> $nombre.' '.$apellido]);
    //->with(['nombre'=> $nombre,
    //'apellido' => $apellido]);
});
Route::get('/contacto', 'PaginaController@contacto');
Route::get('/Colaboradores', 'PaginaController@Colaboradores')->name('col');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
