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
})->name('inicio')->middleware('guest');

// Route::get('/bienvenida/{nombre}/{apellido?}', function ($nombre, $apellido = null) {
//     //return $nombre.' '.$apellido;
//     return view('Paginas.bienvenida', compact('nombre', 'apellido'))
//     ->with(['nombre_completo'=> $nombre.' '.$apellido]);
//     //->with(['nombre'=> $nombre,
//     //'apellido' => $apellido]);
// });

Route::get('info', 'PaginaController@info')->name('paginaInfo');
Route::get('/bienvenida', 'PaginaController@bienvenida');
Route::get('/contacto', 'PaginaController@contacto');
Route::get('/colaboradores', 'PaginaController@colaboradores')->name('col');
Route::get('/inicio', function()
{
    return view('inicio');
});

// Route::get('/empleados/create', 'EmpleadosController@create');
// Route::get('/empleados/edit', 'EmpleadosController@edit');
// Route::get('/empleados/show', 'EmpleadosController@show');
// Route::get('/empleados/update', 'EmpleadosController@update');
// Route::get('/empleados/delete', 'EmpleadosController@delete');

Route::get('/empleados/redireccionar', 'EmpleadosController@redireccionar')->name('empleados.redireccionar');
Route::get('/empleados/redireccionarEmp/{empleado}', 'EmpleadosController@redireccionarEmp')->name('empleados.redireccionarEmp');
// Route::post('/empleados/crearEmpleado', 'EmpleadosController@crearEmp')->name('empleados.crearEmp');

// Route::resource('/bibliotecas', 'BibliotecaController');
Route::match(['GET', 'POST'], '/bibliotecas/listado', 'BibliotecaController@index')->name('bibliotecas.index');
Route::post('/bibliotecas', 'BibliotecaController@store')->name('bibliotecas.store');
Route::get('/bibliotecas/create', 'BibliotecaController@create')->name('bibliotecas.create');
Route::get('/bibliotecas/{biblioteca}', 'BibliotecaController@show')->name('bibliotecas.show');
Route::delete('/bibliotecas/{biblioteca}', 'BibliotecaController@destroy')->name('bibliotecas.destroy');
Route::match(['put', 'patch'], '/bibliotecas/{biblioteca}', 'BibliotecaController@update')->name('bibliotecas.update');
Route::get('/bibliotecas/{biblioteca}/edit', 'BibliotecaController@edit')->name('bibliotecas.edit');

Route::resource('/bibliotecas.unaBiblioteca', 'UnaBibliotecaController');
Route::resource('/clientes', 'ClienteController');
Route::resource('/ejemplares', 'EjemplarController');
Route::resource('/empleados', 'EmpleadosController');
Route::resource('/libros', 'LibroController');
Route::resource('/bibliotecas.librosB', 'LibrosBController');
Route::resource('/materiales', 'MaterialController');
Route::resource('/personas', 'PersonaController');
Route::resource('/prestamos', 'PrestamoController');
// Route::resource('/usuarios', 'UsuarioController');

///Route::get('/empleados/update', 'EmpleadosController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
