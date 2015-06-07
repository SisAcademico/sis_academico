<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('alumno', 'AlumnoController');



Route::get('/', 'PanelController@mostrarPanel');
Route::get('/panel', 'PanelController@mostrarPanel');

Route::get('/carrera', 'CarreraController@listarCarreras');
Route::get('/carrera/crear', 'CarreraController@crearCarrera');

Route::get('pago/listar', 'PagoController@listarPagos');
Route::get('pago/insertar', 'PagoController@insertarPago');

Route::get('docente/listar', 'DocenteController@listarDocente');
Route::get('docente/insertar', 'DocenteController@insertarDocente');


