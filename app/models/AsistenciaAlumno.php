<?php
class AsistenciaAlumno extends Eloquent
{
	protected $table='tasistencia_alumno';
	public $timestamps=false;
	
	public static function getAsignaturasCargo($iddocente){

		$resultadoCursos=DB::table('tdocente')

            ->join('tcarga_academica', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
            ->leftJoin('tasignatura', 'tasignatura.idasignatura', '=', 'tcarga_academica.idasignatura')
            ->leftJoin('tasignatura_cl', 'tasignatura_cl.idasignatura_cl', '=', 'tcarga_academica.idasignatura_cl')
            ->leftJoin('tmodulo', 'tmodulo.idmodulo', '=', 'tasignatura.idmodulo')
            ->leftJoin('tcarrera', 'tcarrera.idcarrera', '=', 'tmodulo.idcarrera')
            ->leftJoin('tsemestre', 'tsemestre.idsemestre', '=', 'tcarga_academica.idsemestre')
			->select('tcarga_academica.*','tasignatura.nombre_asignatura','tasignatura_cl.nombre_asig_cl','tasignatura.idmodulo',
			'tmodulo.nombre_modulo','tcarrera.nombre_carrera','tsemestre.fecha_inicio','tsemestre.fecha_inicio')
			->where('tdocente.iddocente', '=', "$iddocente")
			->orderBy('idsemestre', 'DESC')
            ->get();
        return $resultadoCursos;
	}
	
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
