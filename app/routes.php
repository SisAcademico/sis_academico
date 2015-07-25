<?php
// INICIO: LOGIN de usuario
/*Llamadas al controlador Auth*/
Route::get('/', 'AuthController@mostrarLogin');
Route::get('login', 'AuthController@mostrarLogin'); // Mostrar login
Route::post('login', 'AuthController@postLogin'); // Verificar datos
Route::get('logout', 'AuthController@logOut'); // Finalizar sesión
Route::group(array('before' => 'auth'), function()
{	
    Route::get('/panel', 'PanelController@mostrarPanel'); // vista de panel
//------------- Panel de inicio ----------------
//Route::get('/', 'PanelController@mostrarPanel');
//Route::get('/panel', 'PanelController@mostrarPanel');
// FIN: LOGIN
//--------------asistencia docente---------------------------------
Route::get('docente/insertarasistencia', 'AsistenciaDocenteController@insertarAsistenciaDocente');
Route::post('formulario2', 'AsistenciaDocenteController@store');
Route::get('docente/listarasistencia', 'AsistenciaDocenteController@listar');


Route::get('docente/Eliminarasistencia/{id}','AsistenciaDocenteController@destroy');
Route::get('docente/modificarasistencia/{id}','AsistenciaDocenteController@show');

Route::post('formulario2/{id}','AsistenciaDocenteController@update');
Route::get('docente/insertarasistencia', 'AsistenciaDocenteController@listardocentes');

//creando el filtro
Route::get('docente/filtroAsistencia/{id}','AsistenciaDocenteController@filtrodocente');
Route::get('docente.listarasistencia', 'DocenteController@listarDocente');
//-----------------------------------------------------------------
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
Route::resource('asignatura', 'AsignaturaController');
Route::resource('alumno', 'AlumnoController');

Route::resource('asignaturalibre','AsignaturaLibreController');
Route::resource('detalle_matricula','DetalleMatriculaController');

Route::any('horario/PDFA','HorarioController@getPDF');
Route::resource('horario','HorarioController');
Route::resource('horarioCarga','HorarioCargaController');

Route::any('nota/getCourseData', 'NotaController@getCourseData');
Route::any('nota/PDFA', 'NotaController@getPDF');
Route::resource('nota', 'NotaController');
Route::any('cursolibre/PDFA/{id}','AlumnoController@getPDF');
Route::any('curso/PDFA/{id}','AlumnoController@getPDF2');
Route::any('modulo/PDFA/{id}','AlumnoController@getPDF3');
Route::any('semestre/PDFA/{id}','AlumnoController@getPDF4');


//Route::any('detalle/PDFA/{id}','MatriculaController@getPDF');

//------------- Reporte ----------------
Route::resource('reporte','ReporteController');
//------------- Asistencia Alumno ----------------
Route::group(array('prefix' => 'alumno'), function()
{
	Route::get('asistencia/listar', 'AsistenciaAlumnoController@listar');
	Route::get('asistencia/asignatura/{codAsigGrupo}', 'AsistenciaAlumnoController@listar_asistencia');
	Route::post('/asistencia/agregar_registro', 'AsistenciaAlumnoController@agregar_registro');
	Route::get('/asistencia/{dataAsistencia}', 'AsistenciaAlumnoController@actualizar_registro_asistencia');
	Route::any('/asistencia/registrar/{codAlumno}', 'AsistenciaAlumnoController@registrar');
});
Route::resource('asistenciaalumno', 'AsistenciaAlumnoController');

//------------- Carrera Profesional ----------------
Route::resource('carrera', 'CarreraController');

//------------- Docente ---------------------------
Route::resource('docente', 'DocenteController');
Route::any('docente/reporte', 'DocenteController@getPDF');

//------------- Modulo -------------------------
Route::resource('modulo', 'ModuloController');
//------------- Semestre -------------------------
Route::resource('semestre', 'SemestreController');
//------------- Aula -------------------------
Route::resource('aula', 'AulaController');
//------------- Concepto -------------------------
Route::resource('concepto', 'ConceptoController');
Route::any('concepto/{id}/destroy','ConceptoController@destroy');
Route::get('pago/listar', 'PagoController@listarPagos');
Route::get('pago/insertar', 'PagoController@insertarPago');
Route::post('pago/agregar','PagoController@ajaxc');

//matriculas y detalles matriculas
Route::any('semestreMatricula/PDFA/{id}','MatriculaController@getMatriculaCLSemestre');
Route::any('mesAnioMatricula/PDFA/{id}/{id2}','MatriculaController@getMatriculaCLMesAnio');
Route::any('asignaturaMatricula/PDFA/{id}','MatriculaController@getMatriculaAsig');
Route::any('asignaturalibreMatricula/PDFA/{id}','MatriculaController@getMatriculaAsigLibre');


Route::get('/matricula/listar', 'MatriculaController@index');
Route::get('/matricula/agregar', 'MatriculaController@create');

Route::get('/detalleMatricula/agregar', 'DetalleMatriculaController@create');

Route::any('matricula/detalle/{id}','MatriculaController@detalle');
Route::any('matricula/detalle/PDFA/{id}','MatriculaController@getPDF');
Route::any('matriculacl/detalle/PDFA/{id}','MatriculaController@getPDF3');
Route::resource('matricula','MatriculaController');

Route::any('matricula/create2', 'MatriculaController@create2');
Route::get('/matricula', 'MatriculaController@index');
Route::get('/matricula/agregar', 'MatriculaController@create');
Route::get('detalle_matricula/guardar/{id}','DetalleMatriculaController');
Route::get('/detalleMatricula/agregar/{id}', 'DetalleMatriculaController@create');
Route::get('/detalleMatricula/agregarcl/{id}', 'DetalleMatriculaController@createcl');
//matriculas y detalles matriculas


//------------- Pagos -------------------------
Route::post('pago', 'PagoController@insert');
Route::get('pago/listar', 'PagoController@listarPagos');
Route::get('pago/insertar', 'PagoController@insertarPago');
Route::get('pago/recuperarAlumno', array('uses'=>'PagoController@recuperarAlumno'));
Route::get('pago/recuperarImporte', array('uses'=>'PagoController@recuperarImporte'));



Route::get('cursolibre/listar', 'CursoLibreController@listarCursoLibre');
Route::get('cursolibre/insertar', 'CursoLibreController@insertarCursoLibre');

/*
Route::get('cursolibre/insertar', 'CursoLibreController@insertarCursoLibre');
Route::get('cursolibre/listar', 'CursoLibreController@listarCursoLibre');
*/

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


//-----------------------CARGA ACADEMICA-------------------
//listar por defecto
Route::get('carga_academica/listar', 'CargaAcademicaController@listarCargaAcademica');
//listra con busqueda por semestre
Route::post('carga_academica/listar', 'CargaAcademicaController@listarCargaAcademica');
//insertar
Route::get('carga_academica/insertar', 'CargaAcademicaController@insertar');
Route::post('carga_academica/guardar', 'CargaAcademicaController@guardarcarga');
//modificar
Route::get('carga_academica/editar/{id}','CargaAcademicaController@recuperarparamodificar');
Route::post('carga_academica/modificar/{id}','CargaAcademicaController@modificar');
Route::get('carga_academica/vermas/{id}/{sem}','CargaAcademicaController@vermas');
Route::any('carga_academica/reportepdf/','CargaAcademicaController@getDAPDF');
Route::any('carga_academica/reportecatalogo/{id}/{carrera}','CargaAcademicaController@getcatalogoPDF');

//-------------------------AULA CARGA------------------------------
Route::get('aula_carga/listar', 'AulaCargaController@listarAulaCarga');
Route::get('aula_carga/insertar', 'AulaCargaController@insertar');

Route::any('storeCarga_Horario/','HorarioCargaController@store');
});