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

// Route::get('/bienvenida/{nombre}/{apellido?}', function ($nombre, $apellido = null) {
//     //return $nombre.' '.$apellido;
//     return view('Paginas.bienvenida', compact('nombre', 'apellido'))
//     ->with(['nombre_completo'=> $nombre.' '.$apellido]);
//     //->with(['nombre'=> $nombre,
//     //'apellido' => $apellido]);
// });

Route::get('/info', 'PaginaController@info');
Route::get('/bienvenida', 'PaginaController@bienvenida');
Route::get('/contacto', 'PaginaController@contacto');
Route::get('/colaboradores', 'PaginaController@colaboradores')->name('col');

Route::get('/empleados', "EmpleadosController@index")->name('empleado.index');
Route::get('/inicio', function()
{
    return view('inicio');
});
Route::get('/empleados/create', 'EmpleadosController@create');
Route::get('/empleados/edit', 'EmpleadosController@edit');
Route::get('/empleados/show', 'EmpleadosController@show');
Route::get('/empleados/update', 'EmpleadosController@update');
Route::get('/empleados/delete', 'EmpleadosController@delete');
Route::get('/empleados/store', 'EmpleadosController@store');
///Route::get('/empleados/update', 'EmpleadosController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
