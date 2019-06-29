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

Route::get('info', 'PaginaController@info')->name('paginaInfo');
Route::get('/bienvenida', 'PaginaController@bienvenida');
Route::get('/contacto', 'PaginaController@contacto');
Route::get('/colaboradores', 'PaginaController@colaboradores')->name('col');
Route::get('/inicio', function()
{
    return view('inicio');
});


// Route::get('/redirect', 'PaginaController@redirect')->name('redireccionar');

Auth::routes();


//Manipular todas las bibliotecas
Route::match(['GET', 'POST'], '/bibliotecas/listado', 'BibliotecaController@index')->name('bibliotecas.index');
Route::resource('/bibliotecas', 'BibliotecaController')->except(['index']);


//Esta parte se puede hacer con de otra manera pero me empeñe en crear las rutas una por una así que asi se quedan :3
//Manipular los relacionado a una sola biblioteca
Route::match(['GET', 'POST'], '/bibliotecas/{biblioteca_id}/bibliotecas/listado', 'UnaBibliotecaController@index')->name('bibliotecas.bibliotecas.index');
Route::get('/bibliotecas/{biblioteca_id}/bibliotecas/{biblioteca}', 'UnaBibliotecaController@show')->name('bibliotecas.bibliotecas.show');
Route::delete('/bibliotecas/{biblioteca_id}/bibliotecas/{biblioteca}', 'UnaBibliotecaController@destroy')->name('bibliotecas.bibliotecas.destroy');
Route::match(['put', 'patch'], '/bibliotecas/{biblioteca_id}/bibliotecas/{biblioteca}', 'UnaBibliotecaController@update')->name('bibliotecas.bibliotecas.update');
Route::get('/bibliotecas/{biblioteca_id}/bibliotecas/{biblioteca}/edit', 'UnaBibliotecaController@edit')->name('bibliotecas.bibliotecas.edit');


///Manejar todos los libros
Route::match(['GET', 'POST'], '/libros/listado', 'LibroController@index')->name('libros.index');
Route::get('/libros/create', 'LibroController@create')->name('libros.create');
Route::post('/libros', 'LibroController@store')->name('libros.store');


///Manejar los libros de exclusivamente una biblioteca
Route::match(['GET','POST'], '/bibliotecas/{biblioteca_id}/libros/listado', 'LibrosBController@index')->name('bibliotecas.libros.index');
Route::resource('/bibliotecas.libros', 'LibrosBController')
        ->except(['index'])
        ->parameters(['bibliotecas' => 'biblioteca_id']
);


//Manejar los ejemplares de los libros
Route::resource('/bibliotecas.libros.ejemplares', 'EjemplarLibroController')
        ->parameters(['bibliotecas' => 'biblioteca_id', 'libros' => 'libro_id', 'ejemplares' => 'ejemplar']);


//Manejar los movimientos de un ejemplar Libros
Route::match(['GET','POST'], '/bibliotecas/{biblioteca_id}/libros/{libro}/movimientos', 'MovimientoLibroController@prestamo')->name('bibliotecas.libros.ejemplares.movimientos.prestamo');
Route::match(['GET','POST'], '/movimientos', 'MovimientoLibroController@inicio')->name('movimientos.inicio');
Route::match(['GET','POST'], '/movimientos/prestar/{cliente}/{ejemplar}', 'MovimientoLibroController@prestamo')->name('realizar.prestamo');
Route::match(['GET','POST'], '/movimientos/entrega/{cliente}/{ejemplar}', 'MovimientoLibroController@entrega')->name('realizar.entrega');
// Route::resource('/bibliotecas.libros.ejemplares.movimientos', 'MovimientoLibroController')
//         ->parameters(['bibliotecas' => 'biblioteca_id', 'ejemplares' => 'ejemplar']);

        
//Para manejar todos los materiales registrados
Route::match(['GET','POST'], '/materiales/listado', 'MaterialController@index')->name('materiales.index');
Route::get('/material/create', 'MaterialController@create')->name('materiales.create');
Route::post('/materiales', 'MaterialController@store')->name('materiales.store');


///Manejar todos los materiales de una biblioteca
Route::match(['GET', 'POST'], '/bibliotecas/{biblioteca_id}/materiales/listado', 'MaterialesBController@index')->name('bibliotecas.materiales.index');
Route::resource('/bibliotecas.materiales', 'MaterialesBController')
    ->except(['index'])
    ->parameters([
        'bibliotecas' => 'biblioteca_id',
        'materiales' => 'material'
    ]
);


//Manejar los ejemplares de la biblioteca
Route::resource('/bibliotecas.materiales.ejemplares', 'EjemplarMaterialController')
        ->parameters(['bibliotecas' => 'biblioteca_id', 'materiales' => 'material', 'ejemplares' => 'ejemplar']);


//Manejar los movimientos de un ejemplar Material
Route::resource('/bibliotecas.materiales.ejemplares.movimientos', 'MovimientoMaterialController')
        ->parameters(['bibliotecas' => 'biblioteca_id', 'materiales' => 'material', 'ejemplares' => 'ejemplar']);


Route::get('/bibliotecas/{biblioteca_id}/clientes/adeudos', 'ClienteController@adeudos')->name('bibliotecas.clientes.adeudos');
Route::resource('/bibliotecas.clientes', 'ClienteController')
        ->parameters(['bibliotecas' => 'biblioteca_id']);

//Mostrando el perfil completo
Route::get('/Myperfil', 'UserController@perfil')->name('profile.index');
//Mostrando el formulario para actualizar la informacion
Route::get('/perfil', 'UserController@editPerfil')->name('profile.edit');
//Recibiendo el request para actualizar la informacion
Route::put('/perfil', 'UserController@updatePerfil')->name('profile.update');
//Mostrando el formulario para actualizar la foto
Route::get('/photo', 'UserController@editPhoto')->name('photo.edit');
//Recibiendo el request para actualizar la foto
Route::get('/photo/{imagen}', 'UserController@updatePhoto')->name('photo.update');

Route::get('/home', 'HomeController@index')->name('home');
