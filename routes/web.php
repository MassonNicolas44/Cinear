<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//**  Usuario  

//Alta
Route::get('/usuario/registrar', [App\Http\Controllers\UsuarioController::class, 'registrar'])->name('usuario.registrar');
Route::post('/usuario/guardar', [App\Http\Controllers\UsuarioController::class, 'guardar'])->name('usuario.guardar');

//**  Nacionalidades  

//Alta
Route::get('/nacionalidad/registrar', [App\Http\Controllers\NacionalidadController::class, 'registrar'])->name('nacionalidad.registrar');
Route::post('/nacionalidad/guardarRegistro', [App\Http\Controllers\NacionalidadController::class, 'guardarRegistro'])->name('nacionalidad.guardarRegistro');

//Editar
Route::get('/nacionalidad/editar/{id}', [App\Http\Controllers\NacionalidadController::class, 'editar'])->name('nacionalidad.editar');
Route::post('/nacionalidad/guardarModificacion', [App\Http\Controllers\NacionalidadController::class, 'guardarModificacion'])->name('nacionalidad.guardarModificacion');

//Eliminar
Route::get('/nacionalidad/eliminar/{id}', [App\Http\Controllers\NacionalidadController::class, 'eliminar'])->name('nacionalidad.eliminar');

//Lista
Route::get('/nacionalidad/lista', [App\Http\Controllers\NacionalidadController::class, 'lista'])->name('nacionalidad.lista');

//**  Tipo  

//Alta
Route::get('/tipo/registrar', [App\Http\Controllers\TipoController::class, 'registrar'])->name('tipo.registrar');
Route::post('/tipo/guardarRegistro', [App\Http\Controllers\TipoController::class, 'guardarRegistro'])->name('tipo.guardarRegistro');

//Editar
Route::get('/tipo/editar/{id}', [App\Http\Controllers\TipoController::class, 'editar'])->name('tipo.editar');
Route::post('/tipo/guardarModificacion', [App\Http\Controllers\TipoController::class, 'guardarModificacion'])->name('tipo.guardarModificacion');

//Eliminar
Route::get('/tipo/eliminar/{id}', [App\Http\Controllers\TipoController::class, 'eliminar'])->name('tipo.eliminar');


//**  Idioma  

//Alta
Route::get('/idioma/registrar', [App\Http\Controllers\IdiomaController::class, 'registrar'])->name('idioma.registrar');
Route::post('/idioma/guardarRegistro', [App\Http\Controllers\IdiomaController::class, 'guardarRegistro'])->name('idioma.guardarRegistro');

//Editar
Route::get('/idioma/editar/{id}', [App\Http\Controllers\IdiomaController::class, 'editar'])->name('idioma.editar');
Route::post('/idioma/guardarModificacion', [App\Http\Controllers\IdiomaController::class, 'guardarModificacion'])->name('idioma.guardarModificacion');

//Eliminar
Route::get('/idioma/eliminar/{id}', [App\Http\Controllers\IdiomaController::class, 'eliminar'])->name('idioma.eliminar');

//Lista
Route::get('/idioma/lista', [App\Http\Controllers\IdiomaController::class, 'lista'])->name('idioma.lista');

//**  Restriccion  

//Alta
Route::get('/restriccion/registrar', [App\Http\Controllers\RestriccionController::class, 'registrar'])->name('restriccion.registrar');
Route::post('/restriccion/guardarRegistro', [App\Http\Controllers\RestriccionController::class, 'guardarRegistro'])->name('restriccion.guardarRegistro');

//Editar
Route::get('/restriccion/editar/{id}', [App\Http\Controllers\RestriccionController::class, 'editar'])->name('restriccion.editar');
Route::post('/restriccion/guardarModificacion', [App\Http\Controllers\RestriccionController::class, 'guardarModificacion'])->name('restriccion.guardarModificacion');

//Eliminar
Route::get('/restriccion/eliminar/{id}', [App\Http\Controllers\RestriccionController::class, 'eliminar'])->name('restriccion.eliminar');


//**  Actor  

//Alta
Route::get('/actor/registrar', [App\Http\Controllers\ActorController::class, 'registrar'])->name('actor.registrar');
Route::post('/actor/guardarRegistro', [App\Http\Controllers\ActorController::class, 'guardarRegistro'])->name('actor.guardarRegistro');

//Editar
Route::get('/actor/editar/{id}', [App\Http\Controllers\ActorController::class, 'editar'])->name('actor.editar');
Route::post('/actor/guardarModificacion', [App\Http\Controllers\ActorController::class, 'guardarModificacion'])->name('actor.guardarModificacion');

//Eliminar
Route::get('/actor/eliminar/{id}', [App\Http\Controllers\ActorController::class, 'eliminar'])->name('actor.eliminar');

//Lista
Route::get('/actor/lista', [App\Http\Controllers\ActorController::class, 'lista'])->name('actor.lista');

//**  Categoria  

//Alta
Route::get('/categoria/registrar', [App\Http\Controllers\CategoriaController::class, 'registrar'])->name('categoria.registrar');
Route::post('/categoria/guardarRegistro', [App\Http\Controllers\CategoriaController::class, 'guardarRegistro'])->name('categoria.guardarRegistro');

//Editar
Route::get('/categoria/editar/{id}', [App\Http\Controllers\CategoriaController::class, 'editar'])->name('categoria.editar');
Route::post('/categoria/guardarModificacion', [App\Http\Controllers\CategoriaController::class, 'guardarModificacion'])->name('categoria.guardarModificacion');

//Eliminar
Route::get('/categoria/eliminar/{id}', [App\Http\Controllers\CategoriaController::class, 'eliminar'])->name('categoria.eliminar');


//**  Pelicula  

//Alta
Route::get('/pelicula/registrar', [App\Http\Controllers\PeliculaController::class, 'registrar'])->name('pelicula.registrar');
Route::post('/pelicula/guardarRegistro', [App\Http\Controllers\PeliculaController::class, 'guardarRegistro'])->name('pelicula.guardarRegistro');

//Editar
Route::get('/pelicula/editar/{id}', [App\Http\Controllers\PeliculaController::class, 'editar'])->name('pelicula.editar');
Route::post('/pelicula/guardarModificacion', [App\Http\Controllers\PeliculaController::class, 'guardarModificacion'])->name('pelicula.guardarModificacion');

//Eliminar
Route::get('/pelicula/eliminar/{id}', [App\Http\Controllers\PeliculaController::class, 'eliminar'])->name('pelicula.eliminar');

//Estado
Route::get('/pelicula/estado/{id}/{estado}', [App\Http\Controllers\PeliculaController::class, 'estado'])->name('pelicula.estado');

//Lista
Route::get('/pelicula/lista', [App\Http\Controllers\PeliculaController::class, 'lista'])->name('pelicula.lista');

//**  Reparto  

//Alta
Route::get('/reparto/asignar/{id}', [App\Http\Controllers\RepartoController::class, 'asignar'])->name('reparto.asignar');
Route::post('/reparto/guardarRegistro', [App\Http\Controllers\RepartoController::class, 'guardarRegistro'])->name('reparto.guardarRegistro');

//Eliminar
Route::get('/reparto/eliminar/{id}/{idPelicula}', [App\Http\Controllers\RepartoController::class, 'eliminar'])->name('reparto.eliminar');

//**  Sala  

//Alta
Route::get('/sala/registrar', [App\Http\Controllers\SalaController::class, 'registrar'])->name('sala.registrar');
Route::post('/sala/guardarRegistro', [App\Http\Controllers\SalaController::class, 'guardarRegistro'])->name('sala.guardarRegistro');

//Editar
Route::get('/sala/editar/{id}', [App\Http\Controllers\SalaController::class, 'editar'])->name('sala.editar');
Route::post('/sala/guardarModificacion', [App\Http\Controllers\SalaController::class, 'guardarModificacion'])->name('sala.guardarModificacion');

//Eliminar
Route::get('/sala/eliminar/{id}', [App\Http\Controllers\SalaController::class, 'eliminar'])->name('sala.eliminar');

//Estado
Route::get('/sala/estado/{id}/{estado}', [App\Http\Controllers\SalaController::class, 'estado'])->name('sala.estado');

//**  Funcion

//Alta
Route::get('/funcion/registrar', [App\Http\Controllers\FuncionController::class, 'registrar'])->name('funcion.registrar');
Route::post('/funcion/guardarRegistro', [App\Http\Controllers\FuncionController::class, 'guardarRegistro'])->name('funcion.guardarRegistro');

//EditarIndividual
Route::get('/funcion/editarIndividual/{id}', [App\Http\Controllers\FuncionController::class, 'editarIndividual'])->name('funcion.editarIndividual');
Route::post('/funcion/guardarModificacionIndividual', [App\Http\Controllers\FuncionController::class, 'guardarModificacionIndividual'])->name('funcion.guardarModificacionIndividual');

//EditarTotal
Route::get('/funcion/editarTotal/{id}', [App\Http\Controllers\FuncionController::class, 'editarTotal'])->name('funcion.editarTotal');
Route::post('/funcion/guardarModificacionTotal', [App\Http\Controllers\FuncionController::class, 'guardarModificacionTotal'])->name('funcion.guardarModificacionTotal');

//Eliminar
Route::get('/funcion/eliminar/{id}', [App\Http\Controllers\FuncionController::class, 'eliminar'])->name('funcion.eliminar');

//Estado
Route::get('/funcion/estado/{id}/{estado}', [App\Http\Controllers\FuncionController::class, 'estado'])->name('funcion.estado');

//Lista
Route::get('/funcion/lista', [App\Http\Controllers\FuncionController::class, 'lista'])->name('funcion.lista');











//**  Reserva  

//Alta
Route::get('/reserva/registrar', [App\Http\Controllers\ReservaController::class, 'registrar'])->name('reserva.registrar');
Route::post('/reserva/guardarRegistro', [App\Http\Controllers\ReservaController::class, 'guardarRegistro'])->name('reserva.guardarRegistro');

//Editar
Route::get('/reserva/editar/{id}', [App\Http\Controllers\ReservaController::class, 'editar'])->name('reserva.editar');
Route::post('/reserva/guardarModificacion', [App\Http\Controllers\ReservaController::class, 'guardarModificacion'])->name('reserva.guardarModificacion');

//Eliminar
Route::get('/reserva/eliminar/{id}', [App\Http\Controllers\ReservaController::class, 'eliminar'])->name('reserva.eliminar');

//Estado
Route::get('/reserva/estado/{id}/{estado}', [App\Http\Controllers\ReservaController::class, 'estado'])->name('reserva.estado');

