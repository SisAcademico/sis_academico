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
Route::any('docente/asistencia/listarCursos', 'AsistenciaDocenteController@listarCursosDocente');
Route::any('docente/nota/listarCursos', 'NotaController@listarCursosDocente');
Route::resource('docente/asistencia', 'AsistenciaDocenteController');
Route::resource('docente/nota', 'NotaController');

Route::group(array('prefix' => 'alumno'), function()
{
	Route::get('asistencia/listar', 'AsistenciaAlumnoController@listar');
	Route::get('asistencia/registrar/{codAsignatura}', 'AsistenciaAlumnoController@registrar');

});

Route::resource('asignatura', 'AsignaturaController');
Route::resource('alumno', 'AlumnoController');
Route::resource('matricula','MatriculaController');
Route::resource('asignaturalibre','AsignaturaLibreController');

Route::any('horario/PDFA','HorarioController@getPDF');
Route::resource('horario','HorarioController');
Route::resource('horarioCarga','HorarioCargaController');

Route::any('nota/getCourseData', 'NotaController@getCourseData');
Route::any('nota/PDFA', 'NotaController@getPDF');
Route::resource('nota', 'NotaController');

Route::get('/', 'PanelController@mostrarPanel');
Route::get('/panel', 'PanelController@mostrarPanel');

//------------- Carrera Profesiona ----------------
Route::resource('carrera', 'CarreraController');

//------------- Docente ---------------------------
Route::resource('docente', 'DocenteController');

//------------- Modulo -------------------------
Route::resource('modulo', 'ModuloController');

Route::get('pago/listar', 'PagoController@listarPagos');
Route::get('pago/insertar', 'PagoController@insertarPago');

Route::get('cursolibre/listar', 'CursoLibreController@listarCursoLibre');
Route::get('cursolibre/insertar', 'CursoLibreController@insertarCursoLibre');

/*
Route::get('cursolibre/insertar', 'CursoLibreController@insertarCursoLibre');
Route::get('cursolibre/listar', 'CursoLibreController@listarCursoLibre');
*/
Route::get('semestre/listar', 'SemestreController@listarSemestres');
Route::get('semestre/agregar', 'SemestreController@agregarSemestre');

Route::get('aula/listar', 'AulaController@listarAulas');
Route::get('aula/agregar', 'AulaController@agregarAula');
/*

Route::get('alumno/listar', 'AlumnoController@listarAlumnos');

Route::get('nota/listar', 'AlumnoController@listarAlumnos');
Route::get('nota/insertar', 'NotaController@create');
*/

//*** administrador
Route::get('administrador/listar', 'AdministradorController@listarAdministrador');
Route::get('administrador/insertar', 'AdministradorController@insertarAdministrador');
Route::get('administrador/Eliminar/{id}','AdministradorController@destroy');
Route::get('administrador/modificar/{id}','AdministradorController@show');

Route::post('formulario/{id}','AdministradorController@update');

Route::post('formulario', 'AdministradorController@store');

Route::get('/matricula/listar', 'MatriculaController@index');
Route::get('/matricula/agregar', 'MatriculaController@create');

Route::get('/detalleMatricula/agregar', 'DetalleMatriculaController@create');

//-----------------------CARGA ACADEMICA-------------------
//listar
Route::get('carga_academica/listar', 'CargaAcademicaController@listarCargaAcademica');
//insertar
Route::get('carga_academica/insertar', 'CargaAcademicaController@insertar');
Route::post('wilson', 'CargaAcademicaController@store');
//modificar
Route::get('carga_academica/modificar/{id}','CargaAcademicaController@recuperarparamodificar');
Route::post('wilson/{id}','CargaAcademicaController@modificar');

//-------------------------AULA CARGA------------------------------
Route::get('aula_carga/listar', 'AulaCargaController@listarAulaCarga');
Route::get('aula_carga/insertar', 'AulaCargaController@insertar');

Route::any('storeCarga_Horario/','HorarioCargaController@store');
