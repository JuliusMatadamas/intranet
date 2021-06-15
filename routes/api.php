<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('empresas', 'Api\EmpresaController@index');
Route::get('clientes', 'Api\ClienteController@index');
Route::get('clientes/{empresa}', 'Api\ClienteController@show');
Route::get('planes', 'Api\PlanesController@index');
Route::get('planes/{plan}', 'Api\PlanesController@show');
