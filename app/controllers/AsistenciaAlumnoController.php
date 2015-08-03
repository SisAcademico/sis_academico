<?php

class AsistenciaAlumnoController extends BaseController {
/**
* Invocando a metodo AJAX
*/
 public function registrar($codAlumno)
    {
    	$fecha_hora=Input::get('fecha_horaForm');
    	$codigoAsignatura=Input::get('idasignaturaForm');
    	$obs=Input::get('observacionForm');
    	$matriDel=Input::get('matriDelForm');
    	// averiguamos si existe el registro de este alumno

    	$asisRegAlumno=AsistenciaAlumno::getAlumnoAsistencia($codAlumno,$fecha_hora,$codigoAsignatura);
    	// Verificamos existencia
    	$flag=null;
    	if(count($asisRegAlumno)>0){
    		// procedmos a actualizar
    		if($asisRegAlumno->observacion!=$obs){
    			$flag=AsistenciaAlumno::actualizarAsistenciaAlumno($asisRegAlumno->idasistencia_alumno,$obs);
    			return 1;
    		}else{
    			return 0;
    		}
    	}else{
    		// procedemos a crear un nuevo registro de asistencia
    		$flag=AsistenciaAlumno::agregarAsistenciaAlumno($matriDel,$fecha_hora,$obs);
    		return 1;
    	}

    	if(Request::ajax()){
    		//return Input::get('fecha_horaForm');
    	}
		return $id;
 }
 
/**
* Lista los cursos asignados a un determinado docente según su carga académica
*/
public function listar()
	{
		//ejemplo de un docente
		$docente='d0001';
		// Invocando a Lista de asignaturas segun semestre y carga academica
		$listaAsignaturasCargo=AsistenciaAlumno::getAsignaturasCargo($docente); // un docente de ejemplo
    	return View::make('alumno.asistencia.listar_asignaturas',array('listaAsignaturasCargo' => $listaAsignaturasCargo));
}

/**
* Actualizar Registro de asistencia
*/
public function actualizar_registro_asistencia($dataAsistencia)
	{
		$asigSemestre = explode("|", base64_decode($dataAsistencia));
		$idAsignatura=$asigSemestre[0]; // Codigo de la asignatura
		$semestre=$asigSemestre[1]; // Semestre de la signatura
		$fecha_hora=$asigSemestre[2]; // Fecha de asistencia
		$grupo=$asigSemestre[3]; // Grupo
        // Procedemos a averiguar cuando termina y empieza el semestre
        $objAsignatura=DB::table('tasignatura')->where('idAsignatura', "$idAsignatura")->first();
        $objSemestre=DB::table('tsemestre')->where('idsemestre', "$semestre")->first();
		// Obtenemos la lista de alumnos matriculados
		$relacionAlumnos=AsistenciaAlumno::getRelacionAlumnos($idAsignatura,$objSemestre->fecha_inicio,$objSemestre->fecha_fin); // obtenemos la lista de alumnos
		$codeData=base64_encode($idAsignatura.'|'.$grupo);
		return View::make('alumno.asistencia.modificar_asistencia',array('relacionAlumnos' => $relacionAlumnos,
		'objAsig'=>$objAsignatura,'objSemestre'=>$objSemestre,'fecha_hora'=>$fecha_hora,'dataAsistencia'=>$codeData));
}

/**
* Agregar Asistencia 
*/
public function agregar_registro()
	{

        $fecha_hora = Input::get('fecha_hora');
        $turno = Input::get('turno');
        $grupo = Input::get('grupo');
        $tipo = Input::get('tipo');
        $semestre = Input::get('semestre');
        // Procedemos a averiguar cuando termina y empieza el semestre
        $objSemestre=DB::table('tsemestre')->where('idsemestre', "$semestre")->first();
        $idAsignatura = Input::get('codigoAsignatura');
        $objAsignatura=DB::table('tasignatura')->where('idAsignatura', "$idAsignatura")->first();
		// Obtenemos la lista de alumnos matriculados
		$relacionAlumnos=AsistenciaAlumno::getRelacionAlumnos($idAsignatura,$objSemestre->fecha_inicio,$objSemestre->fecha_fin); // obtenemos la lista de alumnos		

		return View::make('alumno.asistencia.registrar_asistencia',array('relacionAlumnos' => $relacionAlumnos,
		'objAsig'=>$objAsignatura,'tipoAsig'=>$tipo,'grupo'=>$grupo,'objSemestre'=>$objSemestre,'fechaHoraRegistro'=>$fecha_hora));
}
/**
* Lista las relaciones de asistencia pertenecientes a un curso determinado
*/
public function listar_asistencia($codAsigGrupo)
	{
		// Iniciando ejemplo
		$docente="d0001";
		$semestre="2001-I";
		//----
		$dataDecode=base64_decode($codAsigGrupo);
		$asig_grupo = explode("|", $dataDecode);
		$codAsignatura=$asig_grupo[0]; // Codigo de la asignatura
		$grupo=$asig_grupo[1]; // Grupo de la signatura
		// seleccionamos el nombre del asignatura
		$objAsignatura=null;
		$tipoAsignatura=1;
		if(count($objAsig=DB::table('tasignatura')->where('idasignatura', $codAsignatura)->first())>0){
			$objAsignatura=$objAsig;
			$tipoAsignatura=1; // Asignatura de carrera
		}else{
			$objAsignatura=DB::table('tasignatura_cl')->where('idasignatura_cl', $codAsignatura)->first();
			$tipoAsignatura=0; // Asignatura libre
		}
		
		// Invocando a Lista de asignaturas segun semestre y carga academica
		
		$listaRegistrosAsistencia=AsistenciaAlumno::getListaAsistencia($docente,$semestre,$codAsignatura,$grupo); // un docente y semestre de ejemplo
		
		return View::make('alumno.asistencia.listar_asistencia_asignatura',array('listaRegistrosAsistencia' => $listaRegistrosAsistencia,
		'objAsig'=>$objAsignatura,'tipoAsig'=>$tipoAsignatura,'grupo'=>$grupo,'semestre'=>$semestre)); // con datos de ejemplo
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