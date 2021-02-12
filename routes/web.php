<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/inicio', 'InicioController@index')->name('inicio');

Route::middleware(['auth'])->group(function(){
	// Planes
	Route::get('/rh/planes', 'RhPlanesController@index')->name('rh.planes');
	Route::get('/rh/planes/crear', 'RhPlanesController@create')->name('rh.planes.create');

	// Planes
	Route::get('/rh/empleados', 'RhEmpleadosController@index')->name('rh.empleados');
	Route::get('/rh/empleados/alta', 'RhEmpleadosController@create')->name('rh.empleados.create');

	// Vacantes
	Route::get('/rh/vacantes', 'RhVacantesController@index')->name('rh.vacantes');
	Route::get('/rh/vacantes/crear', 'RhVacantesController@create')->name('rh.vacantes.create');
});
