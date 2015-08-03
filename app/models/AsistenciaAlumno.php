<?php
use Carbon\Carbon;

class AsistenciaAlumno extends Eloquent
{
	protected $table='tasistencia_alumno';
	public $timestamps=false;

	/**
	* Procedemos a actualizar la asistencia de un alumno
	*/
	public static function agregarAsistenciaAlumno($iddetalle_matricula,$fecha_hora,$observacion){
		$exito=DB::table('tasistencia_alumno')
		->insert(array('fecha_asist_alumn' => (new Carbon($fecha_hora)),
			'observacion'=>"$observacion",'iddetalle_matricula'=>"iddetalle_matricula"));
        return 1;
	}

	/**
	* Procedemos a actualizar la asistencia de un alumno
	*/
	public static function actualizarAsistenciaAlumno($id_asistencia,$observacion){
		$exito=DB::table('tasistencia_alumno')
			->where('tasistencia_alumno.idasistencia_alumno',"$id_asistencia")
            ->update(array('observacion' => "$observacion"));
        return 1;
	}

	/**
	* Consultamos si un determinado alumno esta ya en el registro de asistencia ACTUAL
	*/
	public static function getAlumnoAsistencia($codAlumno,$fecha_hora,$codigoAsignatura){
		$alumnoAsistencia=DB::table('tmatricula')
			->select('talumno.idalumno','talumno.dni','tasistencia_alumno.fecha_asist_alumn','talumno.nombres',
				'talumno.apellidos','tmatricula.fecha_matricula','tmatricula.idmatricula',
				'tdetalle_matricula.idasignatura','tdetalle_matricula.idasignatura_cl',
				'tasistencia_alumno.idasistencia_alumno','tasistencia_alumno.iddetalle_matricula','tasistencia_alumno.observacion')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula','=','tdetalle_matricula.idmatricula')
            ->leftjoin('talumno', 'talumno.idalumno','=','tmatricula.idalumno')
            ->leftjoin('tasistencia_alumno', 'tasistencia_alumno.iddetalle_matricula','=','tdetalle_matricula.iddetalle_matricula')
            ->where('tasistencia_alumno.fecha_asist_alumn', '=', new Carbon($fecha_hora))
            ->where('tdetalle_matricula.idasignatura', '=', "$codigoAsignatura")
            ->where('tmatricula.idalumno', '=', "$codAlumno")
            ->first();
        return $alumnoAsistencia;
	}

	/**
	* Obtiene las relacion de alumnos
	*/
	public static function getRelacionAlumnos($codAsignatura,$fecha_inicio,$fecha_fin){

		$relacionAlumnos=DB::table('tmatricula')
			->select('talumno.idalumno','talumno.dni','tasistencia_alumno.fecha_asist_alumn','talumno.nombres',
				'talumno.apellidos','tmatricula.fecha_matricula','tmatricula.idmatricula','tdetalle_matricula.idmatricula',
				'tdetalle_matricula.idasignatura','tdetalle_matricula.idasignatura_cl',
				'tasistencia_alumno.idasistencia_alumno','tasistencia_alumno.iddetalle_matricula','tasistencia_alumno.observacion')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula','=','tdetalle_matricula.idmatricula')
            ->leftjoin('talumno', 'talumno.idalumno','=','tmatricula.idalumno')
            ->leftjoin('tasistencia_alumno', 'tasistencia_alumno.iddetalle_matricula','=','tdetalle_matricula.iddetalle_matricula')
			->whereBetween('tmatricula.fecha_matricula', array(new Carbon($fecha_inicio), new Carbon($fecha_fin)))
            ->where('tdetalle_matricula.idasignatura', '=', $codAsignatura)
            ->where('tasistencia_alumno.iddetalle_matricula', '<>', '')
            ->groupBy('idalumno')
			->orderBy('talumno.apellidos', 'ASC')
            ->get();
        return $relacionAlumnos;
	}

	/**
	* Obtiene las lista de cursos asignados a un docente segun su carga academica
	*/
	public static function getAsignaturasCargo($iddocente){

		$asignaturasCargo=DB::table('tdocente')
            ->join('tcarga_academica', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
            ->leftJoin('tasignatura', 'tasignatura.idasignatura', '=', 'tcarga_academica.idasignatura')
            ->leftJoin('tcarga_horario', 'tcarga_horario.idcarga_academica', '=', 'tcarga_academica.idcarga_academica')
            ->leftJoin('thorario', 'thorario.idhorario', '=', 'tcarga_horario.idhorario')
            ->leftJoin('tasignatura_cl', 'tasignatura_cl.idasignatura_cl', '=', 'tcarga_academica.idasignatura_cl')
            ->leftJoin('tmodulo', 'tmodulo.idmodulo', '=', 'tasignatura.idmodulo')
            ->leftJoin('tcarrera', 'tcarrera.idcarrera', '=', 'tmodulo.idcarrera')
            ->leftJoin('tsemestre', 'tsemestre.idsemestre', '=', 'tcarga_academica.idsemestre')
			->select('tcarga_academica.*','thorario.*','tasignatura.nombre_asignatura','tasignatura_cl.nombre_asig_cl','tasignatura.idmodulo',
			'tmodulo.nombre_modulo','tcarrera.nombre_carrera','tsemestre.fecha_inicio','tsemestre.fecha_fin')
			->where('tdocente.iddocente', '=', "$iddocente")
			->orderBy('tcarga_academica.idsemestre', 'DESC')
            ->get();
        return $asignaturasCargo;
	}
	/**
	* Obtiene las lista de asistencias asignados a un docente, curso, grupo y semestre, correspondientemente
	* 
	*/
	public static function getListaAsistencia($iddocente,$semestre=null,$codAsignatura,$grupo){

		$resultadoRegistrosAsistencia=DB::table('tasistencia_alumno')
            ->leftJoin('tdetalle_matricula', 'tasistencia_alumno.iddetalle_matricula','=','tdetalle_matricula.iddetalle_matricula')
            ->leftJoin('tasignatura', 'tasignatura.idasignatura','=','tdetalle_matricula.idasignatura')
            ->leftJoin('tcarga_academica', 'tcarga_academica.idasignatura','=','tasignatura.idasignatura')

			->select('tasistencia_alumno.idasistencia_alumno','tasistencia_alumno.fecha_asist_alumn','tasignatura.idasignatura',
				'tasignatura.nombre_asignatura','tasignatura.horas_semanales','tasignatura.horas_totales','tcarga_academica.idcarga_academica',
				'tcarga_academica.grupo','tcarga_academica.turno','tcarga_academica.idsemestre','tcarga_academica.iddocente')

			->where('tcarga_academica.idsemestre','=',"$semestre")
			->where('tcarga_academica.iddocente','=',"$iddocente")
			->where('tdetalle_matricula.idasignatura','=',"$codAsignatura")
			->where('tcarga_academica.grupo','=',"$grupo")
			->groupBy('tasistencia_alumno.fecha_asist_alumn')
			->orderBy('tasistencia_alumno.fecha_asist_alumn','DESC')
            ->get();
        return $resultadoRegistrosAsistencia;
	}
	/**
	* Obtiene las lista de alumnos correspondientes a un curso
	*/
	public static function listaAlumnosCargo($idasignatura,$semestre=null,$idcargaAcademica=null){
		//----
		$listaAlumnos=DB::table('tdetalle_matricula')
            ->join('tmatricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('talumno', 'talumno.idalumno', '=', 'tmatricula.idalumno')
			->select('talumno.idalumno','talumno.dni','talumno.nombres','talumno.apellidos','talumno.idfoto',
			'tdetalle_matricula.iddetalle_matricula','tdetalle_matricula.idmatricula','idasignatura','tmatricula.fecha_matricula')
			->where('tdetalle_matricula.idasignatura', '=', "$idasignatura")
            ->get();
        return $listaAlumnos;
	}
}
