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
    return view('layouts/app');
});

Route::group(['prefix' => 'usuarios'], function() {
    Route::get('/', 'UsuariosController@index');
    Route::get('/nuevo', 'UsuariosController@create');
    Route::get('/{id}/editar', 'UsuariosController@edit');
    Route::get('/{id}/borrar', 'UsuariosController@destroy');
    Route::post('/guardar', 'UsuariosController@store');
    Route::post('/{id}/guardar', 'UsuariosController@update');
});

