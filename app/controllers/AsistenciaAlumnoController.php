<?php

class AsistenciaAlumnoController extends BaseController {

 public function registrar($codAsignatura)
    {
		$idAsignatura=base64_decode($codAsignatura);
		// Invocando a Lista de alumnos segun codigo de curso
		$listaAlumnos=AsistenciaAlumno::listaAlumnosCargo($idAsignatura);
        return View::make('alumno.asistencia.registrar_asistencia',array('relacionAlumnos' => $listaAlumnos));
 }

public function listar()
	{
	// Invocando a Lista de asignaturas segun semestre y carga academica
	$listaAsignaturasCargo=AsistenciaAlumno::getAsignaturasCargo('2015-I');
    return View::make('alumno.asistencia.listar_asistencia',array('listaAsignaturasCargo' => $listaAsignaturasCargo));
}

public function show($id)
	{
}

public function update($id)
	{


}

public function store()
	{
}


}