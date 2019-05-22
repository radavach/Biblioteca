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

Route::get('/empleados/redireccionar', 'EmpleadosController@redireccionar')->name('empleados.redireccionar');
Route::get('/empleados/redireccionarEmp/{empleado}', 'EmpleadosController@redireccionarEmp')->name('empleados.redireccionarEmp');
// Route::post('/empleados/crearEmpleado', 'EmpleadosController@crearEmp')->name('empleados.crearEmp');

Route::match(['GET', 'POST'], '/bibliotecas/listado', 'BibliotecaController@index')->name('bibliotecas.index');
Route::resource('/bibliotecas', 'BibliotecaController');

Route::match(['GET', 'POST'], '/bibliotecas/{biblioteca_id}/bibliotecas/listado', 'UnaBibliotecaController@index')->name('bibliotecas.bibliotecas.index');
Route::post('/bibliotecas/{biblioteca_id}/bibliotecas', 'UnaBibliotecaController@store')->name('bibliotecas.bibliotecas.store');
Route::get('/bibliotecas/{biblioteca_id}/bibliotecas/create', 'UnaBibliotecaController@create')->name('bibliotecas.bibliotecas.create');
Route::get('/bibliotecas/{biblioteca_id}/bibliotecas/{biblioteca}', 'UnaBibliotecaController@show')->name('bibliotecas.bibliotecas.show');
Route::delete('/bibliotecas/{biblioteca_id}/bibliotecas/{biblioteca}', 'UnaBibliotecaController@destroy')->name('bibliotecas.bibliotecas.destroy');
Route::match(['put', 'patch'], '/bibliotecas/{biblioteca_id}/bibliotecas/{biblioteca}', 'UnaBibliotecaController@update')->name('bibliotecas.bibliotecas.update');
Route::get('/bibliotecas/{biblioteca_id}/bibliotecas/{biblioteca}/edit', 'UnaBibliotecaController@edit')->name('bibliotecas.bibliotecas.edit');

// Route::resource('/bibliotecas.bibliotecas', 'UnaBibliotecaController');
Route::resource('/clientes', 'ClienteController');
Route::resource('/ejemplares', 'EjemplarController');
Route::resource('/empleados', 'EmpleadosController');


Route::match(['GET', 'POST'], '/libros/listado', 'LibroController@index')->name('libros.index');
Route::resource('/libros', 'LibroController');

Route::match(['GET','POST'], '/bibliotecas/{biblioteca_id}/libros/listado', 'LibroController@index')->name('bibliotecas.libros.index');
Route::resource('/bibliotecas.libros', 'LibrosBController')->parameters(['bibliotecas' => 'biblitoeca_id']);

Route::resource('/materiales', 'MaterialController')->parameters(['materiales' => 'material']);
Route::resource('/bibliotecas.materiales', 'MaterialesBController')->parameters([
    'bibliotecas' => 'biblioteca_id',
    'materiales' => 'material'
]);

Route::resource('/personas', 'PersonaController');
Route::resource('/prestamos', 'PrestamoController');
// Route::resource('/usuarios', 'UsuarioController');

///Route::get('/empleados/update', 'EmpleadosController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
