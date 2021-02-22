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
    return view('prueba');
});

//Ejercicio de Prueba
Route::get('/prueba', 'PruebaController@index');

Route::put('/prueba/actualizar', 'PruebaController@update');

Route::post('/prueba/guardar', 'PruebaController@store');

Route::delete('/prueba/borrar/{id}', 'PruebaController@destroy');

Route::get('/prueba/buscar', 'PruebaController@show');