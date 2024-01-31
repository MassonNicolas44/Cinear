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

//Lista
Route::get('/tipo/lista', [App\Http\Controllers\TipoController::class, 'lista'])->name('tipo.lista');

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

//Lista
Route::get('/restriccion/lista', [App\Http\Controllers\RestriccionController::class, 'lista'])->name('restriccion.lista');