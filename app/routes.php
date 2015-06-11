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
Route::resource('nota', 'NotaController');

Route::get('/', 'PanelController@mostrarPanel');
Route::get('/panel', 'PanelController@mostrarPanel');

Route::get('/carrera', 'CarreraController@listarCarreras');
Route::get('/carrera/crear', 'CarreraController@crearCarrera');

Route::get('pago/listar', 'PagoController@listarPagos');
Route::get('pago/insertar', 'PagoController@insertarPago');

Route::get('/asignatura/listar', 'AsignaturaController@index');
Route::get('/asignatura/agregar', 'AsignaturaController@create');

/*
Route::get('semestre/listar', 'SemestreController@listarSemestres');
Route::get('semestre/agregar', 'SemestreController@agregarSemestre');

Route::get('aula/listar', 'AulaController@listarAulas');
Route::get('aula/agregar', 'AulaController@agregarAula');

Route::get('alumno/listar', 'AlumnoController@listarAlumnos');
Route::get('alumno/insertar', 'AlumnoController@insertarAlumno');

Route::get('nota/listar', 'AlumnoController@listarAlumnos');
Route::get('nota/insertar', 'NotaController@create');
*/

Route::get('docente/listar', 'DocenteController@listarDocente');
Route::get('docente/insertar', 'DocenteController@insertarDocente');
//*** administrador
Route::get('/administrador/listar', 'AdministradorController@listarAdministrador');


