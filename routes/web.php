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
Route::get('/inicio', function()
{
    return view('inicio');
});

// Route::get('/empleados', "EmpleadosController@index")->name('empleado.index');
// Route::get('/empleados/create', 'EmpleadosController@create');
// Route::get('/empleados/edit', 'EmpleadosController@edit');
// Route::get('/empleados/show', 'EmpleadosController@show');
// Route::get('/empleados/update', 'EmpleadosController@update');
// Route::get('/empleados/delete', 'EmpleadosController@delete');

Route::post('/empleados/redireccionar', 'EmpleadosController@redireccionar')->name('empleados.redireccionar');
Route::post('/empleados/redireccionarEmp/{empleado}', 'EmpleadosController@redireccionarEmp')->name('empleados.redireccionarEmp');

Route::resource('/bibliotecas', 'BibliotecaController');
Route::resource('/clientes', 'ClienteController');
Route::resource('/ejemplares', 'EjemplarController');
Route::resource('/empleados', 'EmpleadosController');
Route::resource('/libros', 'LibroController');
Route::resource('/materiales', 'MaterialController');
Route::resource('/personas', 'PersonaController');
Route::resource('/prestamos', 'PrestamoController');
Route::resource('/usuarios', 'UsuarioController');

///Route::get('/empleados/update', 'EmpleadosController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
